<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\BaseMoel;
use Illuminate\Support\Facades\DB;



class FactCategory extends Model
{
    public $table = 'fact_benpos_category';

    protected $connection = 'pgsql_treasury';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'dwh_createdon',
        'dwh_modifiedon ',
        'business_date',
        'active_flag',
        'CAT',
        'Category',
        // 'created_by_id',
        // 'updated_by_id',
    ];

    public function getActiveFlagAttribute($value)
    {
        return $value === true ? 'true' : 'false';
    }

    public function saveRecord($input)
    {
        return $this->create($input);
    }

    public function updateRecord($update, $id)
    {
        return $this->find($id)->update($update);
    }
    public function deleteRecord($id)
    {
        return $this->find($id)->delete();
    }

    public function getBenposData()
    {
        $subquery1 = DB::table(function ($query) {
            $query->selectRaw('CASE WHEN isintype = ? THEN ? WHEN isintype = ? THEN ? WHEN isintype = ? THEN ? END AS Product')
                ->selectRaw('cat AS Category, name1 AS "Investor Name", pangir1 AS PAN, position AS Holdings, isin AS ISIN, recdate AS "Record Date", nadate AS "Start Date", nmdate AS "Maturity Date", nfacevn AS "Face Value", code AS CODE, "Category" AS category1, "Name", "Product_Name"')
                ->from('fact_benpos_data')
                ->where('active_flag', true);
        }, 'fct')
            ->leftJoin('fact_benpos_category_pan AS dimcat', 'fct.pangir1', '=', 'dimcat.PAN_No')
            ->leftJoin('fact_benpos_product_isin AS dimprd', 'fct.isin', '=', 'dimprd.ISIN')
            ->select('fct.*')
            ->selectRaw('CASE WHEN fct.category1 IS NULL THEN "Category" ELSE fct.category1 END AS main_category')
            ->selectRaw('CASE WHEN fct."Product_Name" IS NULL THEN fct."Product" ELSE fct."Product_Name" END AS main_product');

        $subquery2 = DB::table($subquery1, 'm')
            ->leftJoin('fact_benpos_category AS cm', 'm.main_category', '=', 'cm.CAT')
            ->select('m.*', 'cm.Category AS main_category');

        $subquery3 = DB::table($subquery2, 'am')
            ->selectRaw('am.main_product AS product, "Investor Name", "PAN", "Holdings", "ISIN", "Record Date", "Start Date", "Maturity Date", "Face Value", "CODE", cm.Category, SUM(am.Holdings * am."Face Value") / 10000000 AS amount')
            ->leftJoin('fact_benpos_category AS cm', 'am.main_category', '=', 'cm.CAT')
            ->where('cm.active_flag', true)
            ->groupBy('am.main_product', 'Investor Name', 'PAN', 'Holdings', 'ISIN', 'Record Date', 'Start Date', 'Maturity Date', 'Face Value', 'CODE', 'cm.Category');

        $finalQuery = DB::table($subquery3, 'final')
            ->select('final.*')
            ->get();

        return $finalQuery;
    }
}

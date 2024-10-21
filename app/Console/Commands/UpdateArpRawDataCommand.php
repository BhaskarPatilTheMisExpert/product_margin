<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArpUpdateRawData;
use App\Models\ArpUpdateReport;
use App\Models\ArpTypeChangeDetail;
use DB, Exception;

class UpdateArpRawDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:arpRawDataCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        /* 
            1)	Change in ARP type - if any ARP Diff column is <> 0 - till other column
            2)	Change in annual repayment number < 50 Cr  - Accelerated Plan Total (Diff) (sum for current FY is <=-50)
            3)	Change in annual repayment number > 50 Cr   -  Accelerated Plan Total (Diff) (sum for current FY is >=50)

            4) Change within month of the year <= 100 Cr     - Accelerated Plan Total (Diff) (for each record is <=100)
            (What happens when value is -ve ex : "-107") - take absolute value

            First step - findout annual value if it is not 0 then check individual row for <=100 value

            5)	Change within month of the year >= 100 Cr   - Accelerated Plan Total (Diff) (for each record is >=100)
           
        */
        try {

            // first truncate raw table
            ArpUpdateRawData::truncate();
            ArpUpdateReport::truncate();
            ArpTypeChangeDetail::truncate();

            $arpTypeChangeQueryList = [
                "select facility_id,facility_name,'scheduled_repayment_diff' as change_reason_column , 'Scheduled Repayment' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where scheduled_repayment_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'ecf_diff' as change_reason_column , 'Diffpayment from excess cashflows' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where ecf_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'rf_diff' as change_reason_column , 'Re-finance' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where rf_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'am_diff' as change_reason_column , 'Asset monetization' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where am_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'ots_diff' as change_reason_column , 'OTS/Settlement' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where ots_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'totalexit_diff' as change_reason_column , 'Entire Cash Sale to AIF (Total exit)' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where totalexit_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'bsaif_diff' as change_reason_column , 'Book shift to AIF' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where bsaif_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'bs_aif_liq_diff' as change_reason_column , 'BSAIF %age liquidity expected' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where bs_aif_liq_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'sale_to_arc_diff' as change_reason_column , 'Sale to ARC' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where sale_to_arc_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'arp_loss_diff' as change_reason_column , 'Loss' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where arp_loss_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'srb_diff' as change_reason_column , 'SRB' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where srb_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'disb_sanct_diff' as change_reason_column , 'Disbursement-Sanctioned but pending' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where disb_sanct_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'ad_diff' as change_reason_column , 'Additional Disbursement' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where ad_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'cai_diff' as change_reason_column , 'Change in Accrued interest' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where cai_diff <> 0 
                group by facility_id,facility_name,change_reason_column",
                "select facility_id,facility_name,'other_diff' as change_reason_column , 'Other' as arp_type, NOW() as created_at , NOW() as updated_at from asmita_arp_db.arp_update_raw_data 
                where other_diff <> 0 
                group by facility_id,facility_name,change_reason_column"
            ];
            $currentFY = date('M') >= 4 ? date('Y') . "-" . date('Y') + 1 : (date('Y') - 1) . "-" . date('Y');


            DB::connection('pgsql_asmita')->beginTransaction();



            $query = 'select  at.facility_id, fac.facility_name, fac.borrower_group, ws.workstream, ws.id as "workstream_id",
            at.month_year as "month_year",
            at.request_id,
            srp.opening_os,
            srp.srp_asper_tos_fin,
            srp.scheduled_disb,
            srp.addition_accrued_int,
            srp.closing_os as closing_os,
            (at.closing_os-arp.closing_os) as "diff_closing_os",
            (at.opening_os-arp.opening_os) as "opening_os_diff",
            (at.srp_project_cf -arp.srp_project_cf) as "scheduled_repayment_diff",
            (at.pr_ecf-arp.pr_ecf) as "ecf_diff",
            (at.rf -arp.rf) as "rf_diff",
            (at.am-arp.am) as "am_diff",
            (at.ots-arp.ots) as "ots_diff",
            (at.cs_to_aif-arp.cs_to_aif) as "totalexit_diff",
            (at.bs_to_aif -arp.bs_to_aif) as "bsaif_diff",
            (at.bs_to_aif_liq_per - arp.bs_to_aif_liq_per) as "bs_aif_liq_diff",
            (at.sale_to_arc - arp.sale_to_arc) as "sale_to_arc_diff",
            (at.loss - arp.loss) as "arp_loss_diff",
            (at.sale_rf_another_lender - arp.sale_rf_another_lender) as "srb_diff",
            (at.disb_pending - arp.disb_pending) as "disb_sanct_diff",
            (at.disb_add - arp.disb_add) as "ad_diff",
            (at.acc_int_change - arp.acc_int_change) as "cai_diff",
            (at.arp_others - arp.arp_others) as "other_diff",
            (at.arp_total-arp.arp_total) as "arp_total_diff",
            (at.closing_os - arp.closing_os) as "closing_os_diff",
            NOW() as created_at,
            NOW() as updated_at
            from asmita_arp_db.arp_targets_stg at
            left join asmita_arp_db.facilities fac on fac.facility_id=at.facility_id
            left join asmita_arp_db.arp_targets arp on at.facility_id=arp.facility_id and at.month_year=arp.month_year
            left join asmita_arp_db.scheduled_repayments srp on at.facility_id=srp.facility_id and at.month_year=srp.month_year
            left join asmita_arp_db.workstreams ws on fac.workstream_id=ws.id
            where at.record_status = \'A1\'
            order by fac.workstream_id asc,fac.facility_id asc, at.month_year asc';

            $results = DB::connection('pgsql_asmita')->select($query);
            if (!empty($results)) {
                $insertRawDataArr = [];
                // pgsql has limit of 65535 character length to insert data. So chunk the input and then insert
                foreach (array_chunk($results, 500) as $key => $value) {
                    $insertRawDataArr[] = ArpUpdateRawData::insert(json_decode(json_encode($value), true));
                }

                if (in_array(false, $insertRawDataArr)) {
                    DB::connection('pgsql_asmita')->rollback();
                    echo "All records not inserted";
                } else {
                    echo "Record inseerted in Raw table";
                    // take group by data and then insert into arp_update_report table
                    $groupedData = ArpUpdateRawData::select('facility_name', 'borrower_group', 'workstream_id', 'workstream', 'facility_id')->groupBy('workstream_id', 'workstream', 'borrower_group', 'facility_id', 'facility_name')->get()->toArray();

                    if (!empty($groupedData)) {
                        $arpReportData = ArpUpdateReport::insert($groupedData);
                        if ($arpReportData) {
                            echo "<pre>";
                            echo "Record inseerted in report table";
                            // check for categories here now
                            // check cat 4 & 5 here
                            $cat4Data = DB::connection('pgsql_asmita')->select("select * from (
                                select 
                                CASE 
                                    WHEN EXTRACT(MONTH FROM month_year)  >=4 
                                    THEN concat(EXTRACT(YEAR FROM month_year), '-',EXTRACT(YEAR FROM month_year)+1) 
                                    ELSE concat(EXTRACT(YEAR FROM month_year)-1,'-', EXTRACT(YEAR FROM month_year)) 
                                END AS app_year , abs(sum(arp_total_diff)) annualData, facility_id 
                                from asmita_arp_db.arp_update_raw_data 
                                group by facility_id, app_year 
                                ) as t where t.annualData <> 0");

                            if (!empty($cat4Data)) {
                                // check for each row of facility year wise for cat 4 i.e. <=100
                                foreach ($cat4Data as $key => $value) {
                                    $isCat4Applicable = DB::connection('pgsql_asmita')->select("select count(*) as totalCount from (select CASE 
                                    WHEN EXTRACT(MONTH FROM month_year)  >=4 
                                    THEN concat(EXTRACT(YEAR FROM month_year), '-',EXTRACT(YEAR FROM month_year)+1) 
                                    ELSE concat(EXTRACT(YEAR FROM month_year)-1,'-', EXTRACT(YEAR FROM month_year)) 
                                    END AS app_year,facility_id , arp_total_diff
                                    from asmita_arp_db.arp_update_raw_data 
                                    where facility_id = '" . $value->facility_id . "' and abs(arp_total_diff) <= 100) as t 
                                    where t.app_year = '" . $value->app_year . "'");

                                    if (!empty($isCat4Applicable) && $isCat4Applicable[0]->totalcount > 0) {
                                        $reportTableData = ArpUpdateReport::where('facility_id', $value->facility_id)->first();
                                        if ($reportTableData && $reportTableData->count()) {

                                            $cat = [];
                                            if (!empty($reportTableData->category)) {
                                                $cat = explode(",", $reportTableData->category);
                                                $cat[] = 'Change within month of the year <= 100 Cr';
                                            } else {
                                                $cat[] = 'Change within month of the year <= 100 Cr';
                                            }
                                            // update category
                                            $reportTableData->update(['category' => implode(",", array_unique($cat))]);
                                        }
                                    }

                                    // check for cat 5
                                    $isCat5Applicable = DB::connection('pgsql_asmita')->select("select count(*) as totalCount from (select CASE 
                                    WHEN EXTRACT(MONTH FROM month_year)  >=4 
                                    THEN concat(EXTRACT(YEAR FROM month_year), '-',EXTRACT(YEAR FROM month_year)+1) 
                                    ELSE concat(EXTRACT(YEAR FROM month_year)-1,'-', EXTRACT(YEAR FROM month_year)) 
                                    END AS app_year,facility_id , arp_total_diff
                                    from asmita_arp_db.arp_update_raw_data 
                                    where facility_id = '" . $value->facility_id . "' and abs(arp_total_diff) > 100) as t 
                                    where t.app_year = '" . $value->app_year . "'");

                                    if (!empty($isCat5Applicable) && $isCat5Applicable[0]->totalcount > 0) {
                                        $reportTableData = ArpUpdateReport::where('facility_id', $value->facility_id)->first();
                                        if ($reportTableData && $reportTableData->count()) {
                                            $cat = [];
                                            if (!empty($reportTableData->category)) {
                                                $cat = explode(",", $reportTableData->category);
                                                $cat[] = 'Change within month of the year > 100 Cr';
                                            } else {
                                                $cat[] = 'Change within month of the year > 100 Cr';
                                            }
                                            // update category
                                            $reportTableData->update(['category' => implode(",", array_unique($cat))]);
                                        }
                                    }
                                }
                                echo "<pre>";
                                echo "Cat4 and 5 updated";
                            }

                            // check for cat 2
                            $cat2Data = DB::connection('pgsql_asmita')->select("select * from (
                                select 
                                CASE 
                                    WHEN EXTRACT(MONTH FROM month_year)  >=4 
                                    THEN concat(EXTRACT(YEAR FROM month_year), '-',EXTRACT(YEAR FROM month_year)+1) 
                                    ELSE concat(EXTRACT(YEAR FROM month_year)-1,'-', EXTRACT(YEAR FROM month_year)) 
                                END AS app_year , abs(sum(arp_total_diff)) annualData, facility_id 
                                from asmita_arp_db.arp_update_raw_data 
                                group by facility_id, app_year 
                                ) as t where t.annualData < 50 and app_year = '" . $currentFY . "'");

                            if (!empty($cat2Data)) {
                                foreach ($cat2Data as $key => $value) {
                                    $reportTableData = ArpUpdateReport::where('facility_id', $value->facility_id)->first();
                                    if ($reportTableData && $reportTableData->count()) {

                                        $cat = [];
                                        if (!empty($reportTableData->category)) {
                                            $cat = explode(",", $reportTableData->category);
                                            $cat[] = 'Change in annual repayment number < 50 Cr';
                                        } else {
                                            $cat[] = 'Change in annual repayment number < 50 Cr';
                                        }
                                        // update category
                                        $reportTableData->update(['category' => implode(",", array_unique($cat))]);
                                    }
                                }
                                echo "<pre>";
                                echo "Cat2 updated";
                            }

                            // check for cat 3
                            $cat3Data = DB::connection('pgsql_asmita')->select("select * from (
                                select 
                                CASE 
                                    WHEN EXTRACT(MONTH FROM month_year)  >=4 
                                    THEN concat(EXTRACT(YEAR FROM month_year), '-',EXTRACT(YEAR FROM month_year)+1) 
                                    ELSE concat(EXTRACT(YEAR FROM month_year)-1,'-', EXTRACT(YEAR FROM month_year)) 
                                END AS app_year , abs(sum(arp_total_diff)) annualData, facility_id 
                                from asmita_arp_db.arp_update_raw_data 
                                group by facility_id, app_year 
                                ) as t where t.annualData > 50 and app_year = '" . $currentFY . "'");

                            if (!empty($cat3Data)) {
                                foreach ($cat3Data as $key => $value) {
                                    $reportTableData = ArpUpdateReport::where('facility_id', $value->facility_id)->first();
                                    if ($reportTableData && $reportTableData->count()) {

                                        $cat = [];
                                        if (!empty($reportTableData->category)) {
                                            $cat = explode(",", $reportTableData->category);
                                            $cat[] = 'Change in annual repayment number > 50 Cr';
                                        } else {
                                            $cat[] = 'Change in annual repayment number > 50 Cr';
                                        }
                                        // update category
                                        $reportTableData->update(['category' => implode(",", array_unique($cat))]);
                                    }
                                }
                                echo "<pre>";
                                echo "Cat3 updated";
                            }

                            // check for cat 1
                            $cat1Data = DB::connection('pgsql_asmita')->select("select *  
                            from asmita_arp_db.arp_update_raw_data
                            where scheduled_repayment_diff <> 0 OR ecf_diff <> 0 
                            OR rf_diff <> 0 OR am_diff <> 0 OR ots_diff <> 0 OR totalexit_diff <> 0 OR bsaif_diff <> 0 
                            OR bs_aif_liq_diff <> 0 OR sale_to_arc_diff <> 0 OR arp_loss_diff <> 0 OR srb_diff <> 0 
                            OR disb_sanct_diff <> 0 OR ad_diff <> 0 OR cai_diff <> 0 OR other_diff <> 0");

                            if (!empty($cat1Data)) {
                                foreach ($cat1Data as $key => $value) {
                                    $cat1FacilityList[] = $value->facility_id;
                                    $reportTableData = ArpUpdateReport::where('facility_id', $value->facility_id)->first();
                                    if ($reportTableData && $reportTableData->count()) {
                                        $cat = [];
                                        if (!empty($reportTableData->category)) {
                                            $cat = explode(",", $reportTableData->category);
                                            $cat[] = 'Change in ARP type';
                                        } else {
                                            $cat[] = 'Change in ARP type';
                                        }
                                        // update category
                                        $reportTableData->update(['category' => implode(",", array_unique($cat))]);
                                    }
                                }
                                echo "<pre>";
                                echo "Cat1 updated";
                            }

                            // now update arp_type_details 
                            foreach ($arpTypeChangeQueryList  as $key => $value) {
                                $detailData = DB::connection('pgsql_asmita')->select($value);
                                if (!empty($detailData)) {
                                    ArpTypeChangeDetail::insert(json_decode(json_encode($detailData), true));
                                }
                            }
                            echo "<pre>";
                            echo "Arp Type detail inserted";

                            // now update remaining columns in arp_type_change_details
                            $allRecords = ArpTypeChangeDetail::get();
                            if ($allRecords && $allRecords->count()) {
                                foreach ($allRecords as $key => $value) {
                                    $updateArr = [];
                                    // take q1
                                    $q1Data = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2022-04-01' and '2022-06-30') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($q1Data) && !empty($q1Data[0])) {
                                        $update['change_q1'] = $q1Data[0]->sum;
                                    }

                                    // take q2
                                    $q2Data = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2022-07-01' and '2022-09-30') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($q2Data) && !empty($q2Data[0])) {
                                        $update['change_q2'] = $q2Data[0]->sum;
                                    }

                                    // take q3
                                    $q3Data = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2022-10-01' and '2022-12-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($q3Data) && !empty($q3Data[0])) {
                                        $update['change_q3'] = $q3Data[0]->sum;
                                    }

                                    // take q4
                                    $q4Data = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2023-01-01' and '2023-03-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($q4Data) && !empty($q4Data[0])) {
                                        $update['change_q4'] = $q4Data[0]->sum;
                                    }

                                    //take FY 22-23
                                    $fy1 = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2022-04-01' and '2023-03-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($fy1) && !empty($fy1[0])) {
                                        $update['change_fy1'] = $fy1[0]->sum;
                                    }

                                    //take FY 23-24
                                    $fy2 = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2023-04-01' and '2024-03-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($fy2) && !empty($fy2[0])) {
                                        $update['change_fy2'] = $fy2[0]->sum;
                                    }

                                    //take FY 24-25
                                    $fy3 = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2024-04-01' and '2025-03-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($fy3) && !empty($fy3[0])) {
                                        $update['change_fy3'] = $fy3[0]->sum;
                                    }

                                    //take FY 25-26
                                    $fy4 = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2025-04-01' and '2026-03-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($fy4) && !empty($fy4[0])) {
                                        $update['change_fy4'] = $fy4[0]->sum;
                                    }

                                    //take FY 26-27
                                    $fy5 = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year between '2026-04-01' and '2027-03-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($fy5) && !empty($fy5[0])) {
                                        $update['change_fy5'] = $fy5[0]->sum;
                                    }

                                    // take 27+
                                    $fy5plus = DB::connection('pgsql_asmita')->select("select sum(" . $value->change_reason_column . ") from asmita_arp_db.arp_update_raw_data
                                    where (month_year > '2027-03-31') and facility_id='" . $value->facility_id . "'");
                                    if (!empty($fy5plus) && !empty($fy5plus[0])) {
                                        $update['change_fy5plus'] = $fy5plus[0]->sum;
                                    }
                                    $value->update($update);
                                }
                            }
                            echo "Arp type details updated";

                            DB::connection('pgsql_asmita')->commit();
                            echo "Successfully Inserted!!!!!!";
                        } else {
                            echo "rollback";
                            DB::connection('pgsql_asmita')->rollback();
                        }
                    }
                }
            }
        } catch (\Illuminate\Database\QueryException $queryEx) {
            echo "in db exception";
            \Log::info($queryEx->getMessage());
        } catch (Exception $e) {
            echo "in exception";
            \Log::info($e->getMessage());
        }
    }
}

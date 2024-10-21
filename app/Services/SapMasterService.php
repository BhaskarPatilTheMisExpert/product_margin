<?php

namespace App\Services;

use App\Models\SapMaster;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use QueryException;



class SapMasterService
{

    public function __construct(SapMaster $sapMaster, User $user)
    {
        $this->sapMaster = $sapMaster;
        $this->user = $user;
    }


    public function getAllData($request)
    {
        return  $this->sapMaster->getAllData($request);
    }

    public function getAllCategories()
    {
        return $this->sapMaster->getAllCategories();
    }
    public function getAllBanks()
    {
        return $this->sapMaster->getAllBanks();
    }
    public function getAllEntities()
    {
        return $this->sapMaster->getAllEntities();
    }

    public function getAllGlTypes()
    {
        return $this->sapMaster->getAllGlTypes();
    }

    public function getAllPusposes()
    {
        return $this->sapMaster->getAllPusposes();
    }

    public function getAllBranches()
    {
        return $this->sapMaster->getAllBranches();
    }

    public function getAllRemarks()
    {
        return $this->sapMaster->getAllRemarks();
    }

    public function getAllSpocs()
    {
        return $this->sapMaster->getALlSpocs();
    }

    public function saveData($input)
    {
        try {

            DB::connection('pgsql_treasury')->beginTransaction();


            $response = [
                'success' => 0,
                'data' => 'failed'
            ];

            $inputData = [
                'category' => $input['category'],
                'entity' => $input['entity'],
                'gl_type' =>  $input['glType'],
                'sap_gl_code_main' => $input['sapCode'],
                'sap_gl_code_payment' => $input['sapCodePayment'],
                'sap_gl_code_receipt' => $input['sapCodeReceipt'],
                'bank_acc_number' => $input['bankAccNo'],
                'bank_name' => $input['bankName'],
                'purpose' => $input['purpose'],
                'branch' => $input['branch'],
                'remark' => $input['remark'],
                'spoc_name' => $input['spocName'],
                'spoc_user_id' => $input['spocUserId'],
                'business_date' => date('Y-m-d'),
                'LCR_purpose_id' => $input['lcrPurpose'],
                'active_flag' => 'TRUE',
            ];


            $insertResult = $this->sapMaster->saveData($inputData);


            if ($insertResult) {
                DB::connection('pgsql_treasury')->commit();
                $response = [
                    'success' => 1,
                    'data' => 'Data Added Successfully',
                ];
            } else {
                DB::connection('pgsql_treasury')->rollBack();
            }
        } catch (Exception $ex) {
            DB::connection('pgsql_treasury')->rollback();
            $response['data'] = $ex->getMessage();
        } catch (QueryException $queryEx) {
            DB::connection('pgsql_treasury')->rollback();
            $response['data'] = $queryEx->getMessage();
        } finally {
            return $response;
        }
    }


    public function getAllDatawithId($id)
    {
        return $this->sapMaster->getAllDatawithId($id);
    }

    public function updateData($input, $id)
    {
        try {
            $response = [
                'success' => 0,
                'data' => 'failed'
            ];

            DB::connection('pgsql_treasury')->beginTransaction();


            $updateData = [
                'category' => $input['category'],
                'entity' => $input['entity'],
                'gl_type' =>  $input['glType'],
                'sap_gl_code_payment' => $input['sapCodePayment'],
                'sap_gl_code_receipt' => $input['sapCodeReceipt'],
                'bank_acc_number' => $input['bankAccNo'],
                'bank_name' => $input['bankName'],
                'purpose' => $input['purpose'],
                'branch' => $input['branch'],
                'remark' => $input['remark'],
                'spoc_name' => $input['spocName'],
                'spoc_user_id' => $input['spocUserId'],
                'LCR_purpose_id' => $input['lcrPurpose'],
                'modified_by' => auth()->user()->name,
                'modified_on' => date('Y-m-d, H:i:s'),

            ];

            $updateResult = $this->sapMaster->updateData($updateData, $id);


            if ($updateResult) {
                DB::connection('pgsql_treasury')->commit();
                $response = [
                    'success' => 1,
                    'data' => 'Data Updated Successfully',
                ];
            } else {
                DB::connection('pgsql_treasury')->rollBack();
            }
        } catch (Exception $ex) {
            DB::connection('pgsql_treasury')->rollback();
            $response['data'] = $ex->getMessage();
        } catch (QueryException $queryEx) {
            DB::connection('pgsql_treasury')->rollback();
            $response['data'] = $queryEx->getMessage();
        } finally {
            return $response;
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Mail\BorrowerBalancesMail;
use Illuminate\Support\Facades\Mail;
use App\Models\OpsMailerBorrowerBalance;
use PDF;
use App\Jobs\BorrowerBalancesJob;

class SendEmailController extends Controller
{
    public function index(){

    	$groupWiseData = OpsMailerBorrowerBalance::where('email_sent','N')->select(['group_name','entity'])->groupBy(['group_name','entity'])->get();
    	if($groupWiseData->count()){
    		foreach ($groupWiseData as $key => $value) {
    			$entityData = OpsMailerBorrowerBalance::where('group_name',$value->group_name)->where('entity',$value->entity)->where('email_sent','N')->get();
    			if($entityData->count()){
    				// get to an cc emails
    				$toEmails = [];
    				$ccEmails = [];
    				foreach ($entityData as $key1 => $value1) {
    					$toEmails = array_merge($toEmails,explode(";",$value1->to_email));
                        if(!empty($value1->cc_email))
    					$ccEmails = array_merge($ccEmails,explode(";",$value1->cc_email));
    				}
    				
    				$jobData = [
    					'toEmails' => $toEmails,
    					'ccEmails' => $ccEmails,
    					'entityData' => $entityData,
    					'entity' => $value->entity,
    					'groupName' => $value->group_name
    				];
    				BorrowerBalancesJob::dispatch($jobData);
    				 echo "job sent ".$entityData->count();
    			}
    		}
    	}	
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate,DB, Exception;
use App\Models\KeyUpdate;
use App\Models\Facility;

class KeyUpdateController extends Controller
{
    //

    public function addEditKeyUpdates()
    {
        abort_if(Gate::denies('asmita_key_updates_add_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        // find out if key updates is aloowed or not
        $currentWindow = DB::connection('pgsql_asmita')->select("select month_cycle from asmita_arp_db.key_updates_cycle_conf where ".date('d')." between start_date_range and end_date_range");
        
        $currentMonthCycle = '';
        
        if(!empty($currentWindow)){
            $currentMonthCycle = $currentWindow[0]->month_cycle;
            
            // get workstreams assigned to the user
            $data = DB::connection('pgsql_asmita')->select("select w.workstream, w.id from workstreams w, workstream_users wu where w.id = wu.workstream_id and wu.user_id = ".auth()->user()->id);
            $workstreamArr = [];
            if(!empty($data)){
                foreach ($data as $key => $value) {
                    $workstreamArr[$value->id] = $value->workstream;
                }
            }
            $workstreams = collect($workstreamArr);
        }else{
            $workstreams = collect([]);
        }
        return view('admin.keyUpdates.add-edit',compact('workstreams','currentMonthCycle'));
    }

    public function getWorkstreamData(Request $request)
    {
        abort_if(Gate::denies('asmita_key_updates_add_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $response = [
            'success' => 0,
            'data' => 'There is some error while processing your request. Please try after sometime.'
        ];
        $workstreamId = $request->get('workstreamId');
        
        // check current window
        $currentWindow = DB::connection('pgsql_asmita')->select("select month_cycle from asmita_arp_db.key_updates_cycle_conf where ".date('d')." between start_date_range and end_date_range");
        if(!empty($currentWindow)){
            $data = [];
            $currentMonthCycle = date("M")."-Window-0".$currentWindow[0]->month_cycle;
            
            // check if we have any record of this with update available yes
            $yesRecords = KeyUpdate::where('workstream_id',$workstreamId)->where('month_cycle',$currentMonthCycle)->where('update_available','Yes')->count();

            if($yesRecords){
                // means display update available as Yes and enable borrower group
                $data['updateAvailable'] = 'Y';
                // get borrowers
                $borrowerGroups = Facility::where('workstream_id',$workstreamId)->groupBy('borrower_group')->pluck('borrower_group');

                $data['borrowerList'] = $borrowerGroups;
            }else{
                // check if there is any record available with update available no
                $noRecords = KeyUpdate::where('workstream_id',$workstreamId)->where('month_cycle',$currentMonthCycle)->where('update_available','No')->count();

                if($noRecords){
                    $data['updateAvailable'] = 'N';
                }
            }

            $response = [
                'success' => 1,
                'data' => $data,
            ];
        }else{
            $response['data'] = 'Not allowed.';
        }

        return response()->json($response);
    }

    public function saveUpdateKeyDetails(Request $request)
    {
        $input = $request->all();

        // add validations later

        // take current window
        $currentWindow = DB::connection('pgsql_asmita')->select("select month_cycle from asmita_arp_db.key_updates_cycle_conf where ".date('d')." between start_date_range and end_date_range");
        if(!empty($currentWindow)){
            $currentMonthCycle = date("M")."-Window-0".$currentWindow[0]->month_cycle;

            if($input['updateAvailable'] == 'No'){
                // check if there is any record exists for update available No. If record exists then update the record else insert new record.
                
                $noRecords = KeyUpdate::where('workstream_id', $input['workstreamId'])->where('month_cycle',$currentMonthCycle)->where('update_available','No')->first();
                
                if($noRecords && $noRecords->count()){
                    // update existing record
                    $noUpdateResult = KeyUpdate::find($noRecords->id)->update([
                        'updated_by_id' => auth()->user()->id,
                    ]);
                    if($noUpdateResult){
                        return redirect('admin/key-updates/create')->with('message','Record updated successfully.')->with('class','success');
                    }else{
                        return redirect()->back()->withInput()->with('message','Error in updation')->with('class','danger');
                    }
                }else{
                    $insertResult = KeyUpdate::create([
                        'workstream_id' => $input['workstreamId'],
                        'key_update_date' => date("Y-m-d"),
                        'month_cycle' => $currentMonthCycle,
                        'update_available' => $input['updateAvailable'],
                        'created_by_id' => auth()->user()->id,
                        'updated_by_id' => auth()->user()->id,
                    ]);
    
                    if($insertResult && $insertResult->count()){
                        return redirect('admin/key-updates/create')->with('message','Record inserted successfully.')->with('class','success');
                    }else{
                        return redirect()->back()->withInput()->with('message','Error in insertion')->with('class','danger');
                    }
                }
            }else if($input['updateAvailable'] == 'Yes'){
                // check if record is already exists or not
                if(isset($input['recordId']) && !empty($input['recordId'])){
                    $updateResult = KeyUpdate::find($input['recordId'])->update([
                        'update_available' => $input['updateAvailable'],
                        'borrower_group' => $input['borrowerGroup'],
                        'npa' => $input['npa'],
                        'overdue_days' => $input['overdue'],
                        'key_update'=> $input['keyUpdate'],
                        'pre_month_cycle'=> $input['preMonthWindow'],
                        'pre_key_update'=> $input['preKeyUpdate'],
                        'updated_by_id' => auth()->user()->id
                    ]);

                    if($updateResult){
                        return redirect('admin/key-updates/create')->with('message','Record updated successfully.')->with('class','success');
                    }else{
                        return redirect()->back()->withInput()->with('message','Error in updation')->with('class','danger');
                    }
                }else{ // insert new record
                    $insertResult = $updateResult = KeyUpdate::create([
                        'workstream_id' => $input['workstreamId'],
                        'key_update_date' => date("Y-m-d"),
                        'month_cycle' => $currentMonthCycle,
                        'update_available' => $input['updateAvailable'],
                        'borrower_group' => $input['borrowerGroup'],
                        'npa' => $input['npa'],
                        'overdue_days' => $input['overdue'],
                        'key_update'=> $input['keyUpdate'],
                        'pre_month_cycle'=> $input['preMonthWindow'],
                        'pre_key_update'=> $input['preKeyUpdate'],
                        'updated_by_id' => auth()->user()->id,
                        'created_by_id' => auth()->user()->id,
                    ]);
                    if($insertResult && $insertResult->count()){
                        return redirect('admin/key-updates/create')->with('message','Record inserted successfully.')->with('class','success');
                    }else{
                        return redirect()->back()->withInput()->with('message','Error in updation')->with('class','danger');
                    }
                }
            }
        }else{
            return redirect()->back()->withInput()->with('message','Addition or updation for key updates are not allowed. Window is closed.')->with('class','danger');
        }
    }

    public function getBorrowerData(Request $request)
    {
        $response = [
            'success' => 0,
            'data' => 'There is some error while processing your request. Please try after sometime',
        ];

        try {
            $input = $request->all();
            $data = [];
    
            // check if already having data for borrower and workstream for specific month
            $recordExits = KeyUpdate::where('workstream_id',$input['workstreamId'])->where('borrower_group',$input['borrower'])->where('month_cycle',$input['currentWondow'])->first();
            if($recordExits && $recordExits->count()){
                $data['recordId'] = $recordExits->id;
                $data['npa'] = $recordExits->npa;
                $data['overdueDays'] = $recordExits->overdue_days;
                $data['keyUpdate'] = $recordExits->key_update;
                $data['preMonthWindow'] = $recordExits->pre_month_cycle;
                $data['preKeyUpdate'] = $recordExits->pre_key_update;

            }else{
                // check if there is already a record with update available as no
                $noRecordExists = KeyUpdate::where('workstream_id',$input['workstreamId'])->where('month_cycle',$input['currentWondow'])->where('update_available','No')->first();

                if($noRecordExists && $noRecordExists->count()){
                    $data['recordId'] = $noRecordExists->id;
                }else{
                    $data['recordId'] = '';
                }

                // take NPA
                $npaCount = Facility::where('borrower_group','like', '%'.$input['borrower'].'%')->where('stage','Stage 3')->count();
                $npaCount > 0 ? $data['npa'] = 'Yes' : $data['npa'] = 'No';
    
                // take overdue
                $overdues = DB::connection("pgsql_beacon")->select("SELECT max(o.dpd) AS days_overdue, o.business_date FROM beacon.fact_dly_asset_classification o where o.group_name='".$input['borrower']."' group by o.business_date order by o.business_date desc limit 1");
                
                if(!empty($overdues)){
                    $data['overdueDays'] = $overdues[0]->days_overdue;
                }else{
                    $data['overdueDays'] = 0;
                }

                // take previous key updates
                $previousRecords = KeyUpdate::where('workstream_id',$input['workstreamId'])->where('borrower_group',$input['borrower'])->where('month_cycle','!=',$input['currentWondow'])->orderBy('id','desc')->first();
                if($previousRecords && $previousRecords->count()){
                    $data['preMonthWindow'] = $previousRecords->month_cycle;
                    $data['preKeyUpdate'] = $previousRecords->key_update;
                }else{
                    $data['preMonthWindow'] = '';
                    $data['preKeyUpdate'] = '';
                }
            }
            $response = [
                'success' => 1,
                'data' => $data,  
            ];
        } catch (Exception $ex) {
            $response['data'] = $ex->getMessage();
        }
        return response()->json($response);
    }
}

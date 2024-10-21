<?php

namespace App\Console\Commands;

use App\Models\AmProjectApproval;
use App\Models\AmProjectApprovalLog;
use Illuminate\Console\Command;

class UpdateAmRequestReferenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:am_request_ref';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To update am_request_ref column in pgdql table ods_stg2_sales_mis_raw_data';

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
        $amProjectApprovals = AmProjectApproval::orderBy('id', 'DESC')->get();

        foreach ($amProjectApprovals as $key => $value) {

            $amProjectApprovalLogCount = AmProjectApprovalLog::whereDate('business_date', $value->business_date)->where('project_id', $value->pid)->where('approved', $value->approval_status)->count();

            if ($amProjectApprovalLogCount == $value->record_count) {
                $updatedRecords = AmProjectApprovalLog::whereDate('business_date', $value->business_date)
                    ->where('project_id', $value->pid)
                    ->where('approved', $value->approval_status)
                    ->update(['am_request_ref' => $value->id]);

                echo "project_id: ", $value->pid;
                echo " business date: " . $value->business_date;
                echo " record count : " . $amProjectApprovalLogCount;;
                echo " ref ID  " . $value->id . "\n";
            }
        }
    }
}

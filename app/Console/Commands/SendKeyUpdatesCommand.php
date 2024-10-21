<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\UserWorkstreamController;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;
use App\Models\KeyUpdate;
use Carbon\Carbon;
use App\Models\KeyUpdateCycleConfig;
use App\Models\Workstream;
use App\Models\WorkstreamUser;
use DB;
use App\Models\UserRole;

class SendKeyUpdatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_key_updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Key Updates to Users 1 day after window.';

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
        // Step 1 - 
        $yesterday = Carbon::yesterday()->format('d');
        $cycleConfig = KeyUpdateCycleConfig::where('end_date_range', $yesterday)->get();
        if ($cycleConfig && $cycleConfig->count()) {
            // step 2 - Fetch all wrokstreams
            $workstreams = Workstream::get();
            if ($workstreams && $workstreams->count()) {
                foreach ($workstreams as $workstream) {
                    $workstreamUsers = WorkstreamUser::where('workstream_id', $workstream->id)->pluck('user_id')->toArray();

                    if (!empty($workstreamUsers)) {
                        // check if these users having role arp_approver_role
                        $userIds = UserRole::whereIn('user_id', $workstreamUsers)->where('role_id', 6)->pluck('user_id')->toArray();

                        $users = User::whereIn('id', $userIds)->get();

                        // $keyUpdates=KeyUpdate::pluck('workstream_id','update_available')->toArray();
                        // dd($keyUpdates);

                 
                    }

                }
            }
        }
    }
}

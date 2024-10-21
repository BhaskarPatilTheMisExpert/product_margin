<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserBackup;
use Illuminate\Support\Facades\Log;
use Exception, DB;
use Illuminate\Database\QueryException;
use Throwable;

class MigrateUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MigrateUsersCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate:usersFromMysqlToPgsql';

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
        database logic  below:
        */

        try {
            $response = [
                'success' => 0,
                'data' => 'Success',
            ];

            DB::beginTransaction();
            $users = User::all()->toArray();

            if (!empty($users)) {
                $TruncateUsers = UserBackup::truncate();
                $data = UserBackup::insert($users);
                if ($data == true) {
                    DB::commit();

                    $response = [
                        'success' => 1,
                        'data' => 'Successfully Updated',
                    ];
                } else {

                    DB::rollback();
                    $response = [
                        'success' => 0,
                        'data' => 'Error',
                    ];
                }
            }
     

        } catch (\Illuminate\Database\QueryException $queryEx) {
            $message = $queryEx->getMessage();
            DB::rollback();
            Log::info($message);
            $response = [
                'success' => 0,
                'data' => 'DB Exception occured'
            ];
        } catch (Exception $ex) {
            DB::rollback();
            $message = $ex->getMessage();
            Log::info($message);
            $response = [
                'success' => 0,
                'data' => 'Exception occured'
            ];
        } finally {
            print_r($response);
        }
    }
}

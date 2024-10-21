<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use App\Models\D2KReverseFeed;
use App\Models\D2KReverseFeedODV;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;


class UpdateS3FileDataToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:s3files {feed}';

    public $modelArray = [
        D2KReverseFeed::class,
        D2KReverseFeedODV::class,
    ];

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
        $feedParameter = $this->argument('feed');


        if ($feedParameter == 'reverse_feed') {
            $prefix = 'reverse_feed';
            $queryObj = $this->modelArray[0];
            $successMessage = "Reverse feed data updated";
            $logData = 'fetch:s3files - ' . $feedParameter . ' - ' . date('d-m-Y H:i:s');

        } elseif ($feedParameter == 'reverse_feed_odv') {
            $prefix = 'Reverse_Feed_Snowflake';
            $queryObj = $this->modelArray[1];
            $successMessage = "Reverse feed ODV data updated";
            $logData = 'fetch:s3files - ' . $feedParameter . ' - ' . date('d-m-Y H:i:s');

        }
        log::info($logData);

        $storage = \Storage::disk('s3');
        $client = $storage->getAdapter()->getClient();
        $command = $client->getCommand('ListObjects');

        $command['Bucket'] = $storage->getAdapter()->getBucket();
        $command['Prefix'] = $prefix;
        $result = $client->execute($command);
        // dd($result['Contents']);
        if (!empty($result['Contents'])) {

            foreach ($result['Contents'] as $data) {
                $path = $data['Key'];
                $getName = explode("/", $path);
                $file_name = end($getName);
                $folderName = dirname($path);
                $timestamp = $data['LastModified']->format('Y-m-d H:i:s');
                $convertedDate = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Asia/Kolkata');

                $getRecord =  $queryObj::select('id','file_name')->where('file_name', $file_name)->first();
                
                if ($getRecord && $getRecord->count()) {
                        $updateArray = [
                            'folder_name' => $folderName,
                            'full_path' => $data['Key'],
                            'file_size' => $data['Size'],
                            'last_modified' => $convertedDate,
                        ];
                        $updateRecord = $queryObj::find($getRecord->id)->update($updateArray);
                        continue;
                } else {
    
                    if ($data['Size'] != '0') {
                        $insertArray = [
                            'file_name' => $file_name,
                            'folder_name' => $folderName,
                            'full_path' => $data['Key'],
                            'file_size' => $data['Size'],
                            'last_modified' => $convertedDate,
                        ];
                        $saveRecord = $queryObj::create($insertArray);

                        if ($saveRecord->wasRecentlyCreated == true) {
                            Log::info($successMessage);
                        } else {
                            Log::info("Error");
                        }
                    }
                }
            }
        }
    }
}

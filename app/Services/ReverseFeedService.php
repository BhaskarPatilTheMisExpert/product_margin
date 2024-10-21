<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Models\Stage;
use App\Models\Entity;
use App\Models\RiskRating;
use App\Models\Workstream;
use Rap2hpoutre\FastExcel\FastExcel;
use Gate, File, DB;
use App\Models\D2KReverseFeed;
use App\Models\D2KReverseFeedODV;
use Illuminate\Support\Facades\DB as FacadesDB;
use Crypt;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class ReverseFeedService 
{
    function __construct(D2KReverseFeed $D2KReverseFeed, D2KReverseFeedODV $D2KReverseFeedODV){
        $this->d2KReverseFeed = $D2KReverseFeed;
        $this->d2KReverseFeedOdv = $D2KReverseFeedODV;
    }
    public function fetchReverseFeedData($input)
    {
       $result = $this->d2KReverseFeed->fetchData($input);
        return $result;
    }
    public function fetchFolderNames()
    {
        return $this->d2KReverseFeed->getFolderName();
    }

    public function fetchReverseFeedOdvData($input)
    {
       $result = $this->d2KReverseFeedOdv->fetchOdvData($input);
        return $result;
    }
    public function fetchFolderNamesOdv()
    {
        return $this->d2KReverseFeedOdv->getFolderNameOdv();
    }
    public function downloadFiles($input)
    {
        
        $Url = '';
        $data = $input;
        $filePath = $data['file_path'];
        $fileName = $data['file_name'];
        $s3 = \Storage::disk('s3');
        $client = $s3->getDriver()->getAdapter()->getClient();
        $expiry = "+1 minutes";
        
        $exists = $s3->exists($filePath);
       
        if ($exists) {

            $command = $client->getCommand('GetObject', [
                'Bucket' => \Config::get('filesystems.disks.s3.bucket'),
                'Key'    => $filePath,
            ]);
            $request = $client->createPresignedRequest($command, $expiry);
            $Url = (string) $request->getUri();

            $headers = [
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ];
            $fileDownld = \Response::make(Storage::disk('s3')->get($filePath), 200, $headers);
            return $fileDownld;
            
        } else {
            // return redirect()->back()->with('message', 'File Does Not exists');

        }
    }


}
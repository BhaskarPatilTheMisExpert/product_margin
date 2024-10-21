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
use App\Models\D2KOdsReverseFeedData;
use App\Models\D2KOdsReverseFeedOdvData;
use Illuminate\Support\Facades\DB as FacadesDB;
use Crypt;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class OdsReverseFeedService 
{
    function __construct(D2KOdsReverseFeedData $D2KOdsReverseFeed, D2KOdsReverseFeedOdvData $D2KOdsReverseFeedODV){
        $this->d2KodsReverseFeed = $D2KOdsReverseFeed;
        $this->d2KodsReverseFeedOdv = $D2KOdsReverseFeedODV;
    }
    public function fetchFeedData($input)
    {
       $result = $this->d2KodsReverseFeed->fetchData($input);
        return $result;  
    }
    public function fetchOdvFeedData($input)
    {
       $result = $this->d2KodsReverseFeedOdv->fetchOdvData($input);
        return $result;  
    }
    public function downloadReverseFeed($input)
    {
        $result = $this->d2KodsReverseFeed->downloadData($input);
        return $result;
    }
    public function downloadOdsReverseFeed($input)
    {
        $result = $this->d2KodsReverseFeedOdv->downloadOdvData($input);
        return $result;   
    }
}
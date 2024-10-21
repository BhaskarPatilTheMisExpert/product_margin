<?php

namespace App\Services;

use App\Models\FactCategory;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use QueryException;



class FactCategoryService
{

    public function __construct(FactCategory $factCategory)
    {
        $this->factCategory = $factCategory;
    }
    public function getBenposData($input)
    {

        return   $this->factCategory->getBenposData($input);
    }
}

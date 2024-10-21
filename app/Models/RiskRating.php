<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskRating extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_asmita';
    public $table = 'risk_ratings';


    protected $fillable = [
        'id',
        'risk_rating',
        'description',
    ];
}

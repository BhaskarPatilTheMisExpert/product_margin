<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_asmita';
    public $table = 'stages';


    protected $fillable = [
        'id',
        'stage',
        'description',
    ];

}

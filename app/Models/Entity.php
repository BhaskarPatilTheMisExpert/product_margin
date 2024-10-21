<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_asmita';
    public $table = 'entities';


    protected $fillable = [
        'id',
        'entity', 
        'description',
        
      
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyUpdateCycleConfig extends Model
{
    use HasFactory;
    public $table = 'key_updates_cycle_conf';
    protected $connection = 'pgsql_asmita';
    protected $guarded = [];
    
}

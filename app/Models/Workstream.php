<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workstream extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_asmita';

    /* public function users()
    {
        return $this->hasOne(User::class);
    } */
}

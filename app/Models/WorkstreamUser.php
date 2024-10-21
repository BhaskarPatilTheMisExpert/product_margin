<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkstreamUser extends Model
{
    use HasFactory;

    protected $connection = 'pgsql_asmita';

    protected $table = 'workstream_users';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailerConfig extends Model
{
    use HasFactory;
    public $table = 'emailer_config';
    protected $connection = 'pgsql_asmita';
    public $timestamps = false;




    protected $fillable = [
        'id',
        'emailer_type',
        'to_emails',
        'cc_emails',
        'created_by',
        'updated_at',
    ];
}

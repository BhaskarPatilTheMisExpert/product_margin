<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LcrPurpose extends Model
{
    use HasFactory;
    public $table = 'sap_gl_lcr_cat';
    protected $connection = 'pgsql_treasury';
    public $timestamps = false;

    public $fillable = [
        'id',
        'category',
    ];
}

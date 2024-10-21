<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBackup extends Model
{
    use HasFactory;

    public $table = 'users';

    protected $connection = 'pgsql_asmita';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'status','emp_id',
        'ldap_username',
        'user_type',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

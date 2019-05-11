<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'email_admin', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'username', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pimpinans()
    {
       return $this->hasMany(Pimpinan::class);
    }
}

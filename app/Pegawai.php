<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class Pegawai extends Authenticatable
{
    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'nama_pegawai', 'nip', 'no_telp_pegawai', 'email_pegawai', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

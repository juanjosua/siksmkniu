<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use Notifiable;

    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'foto_pegawai', 'nama_pegawai', 'nip', 'no_telp_pegawai', 'email_pegawai', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function jabatanable(){
        return $this->morphTo();
    }
}

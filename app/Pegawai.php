<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Pegawai extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'foto_pegawai', 'nama_pegawai', 'nip', 'no_telp_pegawai', 'email_pegawai', 'password', 'status_pegawai'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function jabatanable(){
        return $this->morphTo();
    }
}

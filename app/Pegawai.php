<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    protected $table = 'pegawais';
    protected $primaryKey = 'pegawai_id';
    protected $fillable = [
        'nama_pegawai', 'nip', 'no_telp_pegawai', 'email_pegawai', 'foto_pegawai', 'jabatan_pegawai', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function surat() {
        return $this->hasMany('App\Surat', 'pengunggah_surat', 'pegawai_id');
    }
}

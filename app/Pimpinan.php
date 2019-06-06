<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Pegawai
{
    protected $table = 'pimpinans';
    protected $primaryKey = 'id_pimpinan';
    protected $fillable = [
        
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function disposisis()
    {
       return $this->hasMany(Disposisi::class);
    }

    public function arsips()
    {
        return $this->hasMany(Arsip::class);
    }

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }

}
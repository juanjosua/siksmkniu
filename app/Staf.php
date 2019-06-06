<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Pegawai
{
    protected $table = 'stafs';
    protected $primaryKey = 'id_staf';
    protected $fillable = [
        
    ];

    public function disposisis()
    {
       return $this->hasMany(Disposisi::class);
    }

    public function surats()
    {
       return $this->hasMany(Surat::class);
    }

    //fungsi inherit pegawai
    public function pegawais()
    {
        return $this->morphMany(Pegawai::class, 'jabatan');
    }

}
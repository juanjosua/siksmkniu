<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Pegawai
{
    protected $table = 'stafs';
    protected $primaryKey = 'id_staf';
    protected $fillable = [
        'id_sektor'
    ];

    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'id_sektor');
    }

    public function disposisis()
    {
       return $this->hasMany(Disposisi::class);
    }

    //fungsi inherit pegawai
    public function pegawais()
    {
        return $this->morphMany('App\Pegawai', 'jabatanable');
    }

}
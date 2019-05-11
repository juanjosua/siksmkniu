<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansis';
    protected $primaryKey = 'instansi_id';
    protected $fillable = [
        'nama_instansi', 'alamat_instansi', 'no_telp_instansi', 'email_instansi'
    ];
}

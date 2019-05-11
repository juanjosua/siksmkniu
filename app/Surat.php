<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surats';
    protected $primaryKey = 'surat_id';
    protected $fillable = [
        'no_surat', 'perihal_surat', 'pengirim_surat', 'tujuan_surat', 'tanggal_pembuatan_surat', 'jenis_surat', 'pengunggah_surat'
    ];
}

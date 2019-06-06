<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsips';
    protected $primaryKey = 'id_arsip';
    protected $fillable = [
        'tanggal_arsip'
    ];

    public function pimpinan()
    {
        return $this->belongsTo(Pimpinan::class);
    }
}

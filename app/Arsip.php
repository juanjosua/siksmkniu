<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsips';
    protected $primaryKey = 'arsip_id';
    protected $fillable = [
        'surat_id', 'pengarsip'
    ];
}

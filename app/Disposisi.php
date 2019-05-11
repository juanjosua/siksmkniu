<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisis';
    protected $primaryKey = 'disposisi_id';
    protected $fillable = [
        'surat_id', 'pembuat_disposisi', 'penerima_disposisi'
    ];
}

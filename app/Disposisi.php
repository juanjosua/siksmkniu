<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisis';
    protected $primaryKey = 'id_disposisi';
    protected $fillable = [
        'tanggal_disposisi', 'pesan_disposisi'
    ];

    public function pimpinan()
    {
        return $this->belongsTo(Pimpinan::class);
    }

    public function staf()
    {
        return $this->belongsTo(Staf::class);
    }
}

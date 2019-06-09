<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surats';
    protected $primaryKey = 'id_surat';
    protected $fillable = [
        'image','no_surat', 'perihal_surat', 'tanggal_surat', 'id_pimpinan', 'id_sektor', 'id_instansi', 'id_staf'
    ];

    public function pimpinan()
    {
        return $this->belongsTo(Pimpinan::class, 'id_pimpinan');
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    public function staf()
    {
        return $this->belongsTo(Staf::class, 'id_staf');
    }

    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'id_sektor');
    }
}

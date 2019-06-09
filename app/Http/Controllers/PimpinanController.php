<?php

namespace App\Http\Controllers;

use App\Arsip;
use App\Surat;
use App\Disposisi;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    //proses surat yang akan selanjutnya ditinjau pimpinan
    public function prosesSurat($id)
    {
        //update surat
        //update status surat
        $surat = Surat::find($id);
        $surat->status_surat++;
        $surat->save();

        return redirect()->back();

    }

    //cancel surat yang akan ditinjau
    public function cancelSurat($id)
    {
        //menurunkan status surat
        $surat = Surat::find($id);
        $surat->status_surat--;
        $surat->save();

        return redirect()->back();
    }

    //download surat
    public function downloadSurat($id)
    {

    }
}

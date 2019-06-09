<?php

namespace App\Http\Controllers;

use App\Surat;
use App\Disposisi;
use Illuminate\Http\Request;

class StafController extends Controller
{
    // proses surat untuk ditinjau pimpinan
    public function prosesSurat($id)
    {
        //update surat
        //update status surat
        $surat = Surat::find($id);
        $surat->status_surat++;
        $surat->save();

        return redirect()->back();

    }

    // cancel surat yang sudah mau ditinjau pimpinan
    public function cancelSurat($id)
    {
        //menurunkan status surat
        $surat = Surat::find($id);
        $surat->status_surat--;
        $surat->save();

        return redirect()->back();
    }

    // download surat
    public function downloadSurat($id)
    {
        
    }
}

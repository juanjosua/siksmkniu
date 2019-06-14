<?php

namespace App\Http\Controllers;

use App\Arsip;
use App\Disposisi;
use App\Surat;
use App\Pegawai;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArsipController extends Controller
{
    //view semua arsip
    public function index()
    {
        $arsips = Arsip::all();
        $jumlaharsip = $arsips->count();
        return view('arsipSurat', compact('arsips', 'jumlaharsip'));
    }

    //arsip baru
    public function createArsip($id)
    {
        Arsip::create([
          'id_pimpinan'             => Session::get('data')->jabatanable_id,
          'id_surat'                => $id
        ]);

        //update status surat
        $surat = Surat::find($id);
        $surat->status_surat = 'arsip';
        $surat->save();

        //disposisi ga boleh dihapus karena di arsip ada record tentang disposisi
        // if ($disposisi = Surat::find($id)->disposisi) {
        //     $disposisi->delete();
        // }

        return redirect()->back();
    }

    //detail arsip
    public function detailArsip($id)
    {
        $pimpinans = Pegawai::all()->where('jabatanable_type', 'App\Pimpinan');
        $stafs = Pegawai::all()->where('jabatanable_type', 'App\Staf');

        $id_surat = Arsip::find($id)->surat->id_surat;
        //menampilkan detil informasi surat yang didisposisi
        $surat = Surat::all()->where('id_surat', $id_surat)->first();

        $disposisi = Disposisi::find($id);
        $arsip = Arsip::find($id);
        return view('detailArsip', compact('surat', 'disposisi', 'arsip', 'pimpinans', 'stafs'));
    }

    //hapus arsip
    public function destroyArsip($id)
    {
        $arsip = Arsip::find($id);
        $id_surat = $arsip->surat->id_surat;
        $surat = Surat::find($id_surat);
        $surat->status_surat = 'tinjau';
        $surat->save();

        //hapus disposisi
        $arsip->delete();

        return redirect()->back();
    }
}

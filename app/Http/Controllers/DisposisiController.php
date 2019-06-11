<?php

namespace App\Http\Controllers;

use App\Disposisi;
use App\Surat;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DisposisiController extends Controller
{
    //list semua disposisi
    public function index(disposisi $disposisi)
    {   
        //check if staf logged in
        if (Session::get('data')->jabatanable_type == 'App\Staf') {
            //get disposisi yang sesuai dengan staf yang sedang lagi
            $disposisis = Disposisi::all()->where('id_staf', Session::get('data')->jabatanable_id);
            $jumlahdisposisi = $disposisis->count(); //hitung semua disposisi

        } elseif (Session::get('data')->jabatanable_type == 'App\Pimpinan') {
            $disposisis = Disposisi::all(); //get semua disposisi
            $jumlahdisposisi = Disposisi::all()->count(); //hitung semua disposisi
        } else {
            $jumlahdisposisi = 0;
        }

        $pimpinans = Pegawai::all()->where('jabatanable_type', 'App\Pimpinan');
        return view('disposisiSurat', compact('disposisis', 'jumlahdisposisi', 'pimpinans'));
    }

    //simpan disposisi baru
    public function storeDisposisi(Request $request)
    {
        //get id staf tujuan disposisi
        $id_staf = Pegawai::all()->where('nama_pegawai', $request->nama_pegawai)->first()->jabatanable_id;

        Disposisi::create([
          'pesan_disposisi'         => $request->pesan_disposisi,
          'id_pimpinan'             => Session::get('data')->jabatanable_id,
          'id_staf'                 => $id_staf,
          'id_surat'                => $request->id_surat
        ]);

        //update status surat
        $surat = Surat::find($request->id_surat);
        $surat->status_surat = 'disposisi';
        $surat->save();

        return redirect()->back();
    }

    //buka salah satu disposisi (details)
    public function showDisposisi(disposisi $disposisi)
    {
        //
    }

    //form ubah disposisi
    public function editDisposisi(disposisi $disposisi)
    {
        //
    }

    //update disposisi sudah selesai
    public function updateDisposisi($id)
    {
        $disposisi = Disposisi::find($id);
        $disposisi->status_disposisi = 'selesai';
        $disposisi->save();

        return redirect()->back();
    }

    //hapus disposisi
    public function destroyDisposisi(disposisi $disposisi)
    {
        //
    }
}

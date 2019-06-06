<?php

namespace App\Http\Controllers;

use App\Disposisi;
use App\Surat;
use App\Pegawai;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDisposisi()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDisposisi($id)
    {
        //tambah disposisi baru
        $surat = Surat::find($id);
        $surat->status_surat++;
        $surat->save();

        Disposisi::create([
          'no_surat'                => $request->no_surat,
          'pengirim_surat'          => $request->pengirim_surat,
          'tujuan_surat'            => $request->tujuan_surat,
          'perihal_surat'           => $request->perihal_surat,
          'jenis_surat'             => $request->jenis_surat,
          'tanggal_pembuatan_surat' => $request->tanggal_pembuatan_surat,
          'pengunggah_surat'        => $pengunggah
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDisposisi(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function showDisposisi(disposisi $disposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function editDisposisi(disposisi $disposisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function updateDisposisi(Request $request, disposisi $disposisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function destroyDisposisi(disposisi $disposisi)
    {
        //
    }
}

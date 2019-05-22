<?php

namespace App\Http\Controllers;

use App\Surat;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSurat()
    {
        //memanggil form untuk buat surat baru
        return view('unggahSurat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSurat(Request $request)
    {
        //simpan form surat yang baru dibuat
        //upload gambar
        $image  = $request->file('image')->store('gambar');
        $pengunggah = Session::get('data')->pegawai_id;

        Surat::create([
          'image'                   => $image,
          'no_surat'                => $request->no_surat,
          'pengirim_surat'          => $request->pengirim_surat,
          'tujuan_surat'            => $request->tujuan_surat,
          'perihal_surat'           => $request->perihal_surat,
          'jenis_surat'             => $request->jenis_surat,
          'tanggal_pembuatan_surat' => $request->tanggal_pembuatan_surat,
          'pengunggah_surat'        => $pengunggah
        ]);

        //redirect halaman daftar surat masuk
        //redirect ke show surat
        return redirect('/surat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function showSurat(surat $surat)
    {
        //view semua daftar surat
        $surats = Surat::all();
        $jumlahsuratunggah = $surats->where('status_surat', 1)->count(); //jumlah surat baru diupload
        $jumlahsurattinjau = $surats->where('status_surat', 2)->count(); //jumlah surat sedang ditinjau
        $jumlahsuratdisposisi = $surats->where('status_surat', 3)->count(); //jumlah surat disposisi

        if (Session::get('data')->jabatan_pegawai == 'staff') {
            return view('staff_suratBaru', compact('surats', 'jumlahsuratunggah', 'jumlahsurattinjau', 'jumlahsuratdisposisi'));    
        } else {
            return view('pimpinan_suratBaru', compact('surats', 'jumlahsuratunggah', 'jumlahsurattinjau', 'jumlahsuratdisposisi'));
        }
    }

    public function detailSurat($id)
    {
        //menampilkan detil informasi setiap surat
        $surat = Surat::find($id);
        return view('detailSurat', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function editSurat(surat $surat)
    {
        //halaman edit surat
        $surat = Surat::find($id);
        return view('editSurat', compact('surat'));

    }

    public function updateSurat(Request $request, $id)
    {
        //update suratnya
        $surat = Surat::find($id);
        $surat->update([
          'no_surat'                => $request->input('no_surat'),
          'pengirim_surat'          => $request->input('pengirim_surat'),
          'tujuan_surat'            => $request->input('tujuan_surat'),
          'perihal_surat'           => $request->input('perihal_surat'),
          'jenis_surat'             => $request->input('jenis_surat'),
          'tanggal_pembuatan_surat' => $request->input('tanggal_pembuatan_surat'),
        ]);

        return redirect('/surat/detail/' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function prosesSurat($id)
    {
        //update surat
        //update status surat
        $surat = Surat::find($id);
        $surat->status_surat++;
        $surat->save();

        return redirect()->back();

    }

    public function cancelSurat($id)
    {
        //menurunkan status surat
        $surat = Surat::find($id);
        $surat->status_surat--;
        $surat->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroySurat($id)
    {
        //hapus surat
        $surat = Surat::find($id);
        $surat->delete();

        return redirect()->back();
    }
}

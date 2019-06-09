<?php

namespace App\Http\Controllers;

use App\Surat;
use App\Pegawai;
use App\Instansi;
use App\Sektor;
use App\Disposisi;
use App\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratController extends Controller
{
    //get form surat baru
    public function createSurat()
    {
        //memanggil form untuk buat surat baru
        $instansis  = Instansi::all();
        $sektors    = Sektor::all();
        return view('unggahSurat', compact('instansis', 'sektors'));
    }

    //simpan form surat baru
    public function storeSurat(Request $request)
    {
        //upload gambar
        $image  = $request->file('image')->store('gambar');
        //check if instansi already exists
        $instansi = Instansi::all()->where('nama_instansi', $request->pengirim_surat)->first();
        //get sektor
        $sektor = Sektor::all()->where('nama_sektor', $request->tujuan_surat)->first();
        //check siapa yang mengunggah
        $jabatan = Session::get('data')->jabatanable_type;
        $id_jabatan = Session::get('data')->jabatanable_id;
        //buat instansi baru jika belum ada
        if (!$instansi) {
            Instansi::create([
                'nama_instansi' => $request->pengirim_surat
            ]);
        };
        //foreign key
        $id_sektor      = $sektor->id_sektor;
        $id_instansi    = $instansi->id_instansi;

        if ($jabatan == 'App\Staf') {
            $id_staf = $id_jabatan;
            $id_pimpinan = NULL;
        } else { 
            $id_pimpinan = $id_jabatan;
            $id_staf = NULL;
         }

        Surat::create([
          'image'                   => $image,
          'no_surat'                => $request->no_surat,
          'perihal_surat'           => $request->perihal_surat,
          'tanggal_surat'           => $request->tanggal_surat,
          'id_sektor'               => $id_sektor,
          'id_instansi'             => $id_instansi,
          'id_pimpinan'             => $id_pimpinan,
          'id_staf'                 => $id_staf
        ]);

        //redirect halaman daftar surat masuk
        //redirect ke show surat
        return redirect('/surat');
    }

    //show semua surat di database
    public function showSurat(surat $surat)
    {
        //view semua daftar surat
        $pegawais = Pegawai::all();
        $surats = Surat::all();

        $jumlahsuratbaru = $surats->where('status_surat', 'baru')->count(); //jumlah surat baru diupload
        $jumlahsurattinjau = $surats->where('status_surat', 'tinjau')->count(); //jumlah surat sedang ditinjau

        if (Session::get('data')->jabatanable_type == 'App\Staf') {
            return view('staf_suratBaru', compact('surats', 'jumlahsuratbaru', 'jumlahsurattinjau'));    
        } else {
            return view('pimpinan_suratBaru', compact('surats', 'jumlahsuratbaru', 'jumlahsurattinjau', 'pegawais'));
        }
    }

    // proses surat untuk ditinjau pimpinan
    public function prosesSurat($id)
    {
        //update surat
        //update status surat
        $surat = Surat::find($id);
        $surat->status_surat = 'tinjau';
        $surat->save();

        return redirect()->back();

    }

    // cancel surat yang sudah mau ditinjau pimpinan
    public function cancelSurat($id)
    {
        //menurunkan status surat
        $surat = Surat::find($id);
        $surat->status_surat = 'baru';
        $surat->save();

        return redirect()->back();
    }

    // download surat
    public function downloadSurat($id)
    {
        
    }

    //get individual surat
    public function detailSurat($id)
    {
        //menampilkan detil informasi setiap surat
        $surat = Surat::find($id);
        return view('detailSurat', compact('surat'));
    }

    //form edit surat
    public function editSurat($id)
    {
        //halaman edit surat
        $surat = Surat::find($id);
        return view('editSurat', compact('surat'));

    }

    //save editan surat
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

    //hapus surat
    public function destroySurat($id)
    {
        //hapus surat
        $surat = Surat::find($id);
        $surat->delete();

        return redirect()->back();
    }
}

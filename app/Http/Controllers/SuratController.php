<?php

namespace App\Http\Controllers;

use App\surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSurat()
    {
        //list surat
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSurat()
    {
        //form untuk buat surat baru
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSurat(Request $request)
    {
        //simpan surat yang baru dibuat
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function showSurat(surat $surat)
    {
        //get surat / ambil surat
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function editSurat(surat $surat)
    {
        //form edit surat
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function updateSurat(Request $request, surat $surat)
    {
        //update surat
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroySurat(surat $surat)
    {
        //hapus surat
    }
}

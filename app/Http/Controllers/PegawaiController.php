<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Staf;
use App\Surat;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    //redirect home after login
    public function index()
    {
        if (Auth::user()->jabatanable_type == 'App\Staf') {
            return redirect('/disposisi');
        } elseif (Auth::user()->jabatanable_type == 'App\Pimpinan') {
            return view('pimpinan_suratBaru');
        } else {
            return redirect('/unggah');
        }
        
    }

}
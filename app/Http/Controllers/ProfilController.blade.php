<?php

namespace App\Http\Controllers;

use App\Arsip;
use App\Disposisi;
use App\Surat;
use App\Pegawai;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    //view profile
    public function profil()
    {
        return view('profilPegawai');
    }

    //update data
    public function updateProfil(request $request, $id)
    {
        //Authenticate User yang sedang login
	    $pegawai = Pegawai::find($id);
	    //Update
	    $pegawai->update([
	         'nama_pegawai'         => $request->input('nama_pegawai'),
	         'email_pegawai'        => $request->input('email_pegawai'),
	         'no_telp_pegawai'      => $request->input('no_telp_pegawai')
	         'nip'					=> $request->input('nip');
	         'password'				=> $request->input('password');
	     ]);

	    return redirect()->back();
    }

    //update avatar
    public function updateAvatar($id)
    {
        //Authenticate User yang sedang login
	    $user = Auth::User();

	    if($request->User()->avatar) {
	      Storage::delete($request->User()->avatar);
	    }

	    //upload gambar
	    $image  = $request->file('avatar')->store('avatars');

	    //Update
	    $user->update([
	         'avatar'        => $image,
	     ]);

	    return redirect()->back();
    }

}

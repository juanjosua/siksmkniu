<?php

namespace App\Http\Controllers;

use App\Arsip;
use App\Disposisi;
use App\Surat;
use App\Pegawai;
use App\Sektor;
use App\Staf;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    //view profile
    public function profil()
    {
    	// nama sektor pegawai
    	$exist = Auth::user()->jabatanable->id_sektor;
    	$nama_sektor = Sektor::find(Auth::user()->jabatanable->id_sektor);
    	$sektors = Sektor::all();
        return view('profilPegawai', compact('sektors', 'nama_sektor', 'exist'));
    }

    //update data
    public function updateProfil(request $request, $id)
    {
	    $pegawai = Pegawai::find($id);

	    //upload gambar
	    if( !is_null( $request->file('foto_pegawai') ) ){
		    	//current foto
		    	$foto = Session::get('data')->foto_pegawai;
			    if($foto) {
			      Storage::delete($foto);
			    }
		    $image  = $request->file('foto_pegawai')->store('avatars');
		    $pegawai->update([ 'foto_pegawai' => $image ]);
		}

		//password baru
	    if( !is_null( $request->input('password') ) ){
	    	$pegawai->update([ 'password' => Hash::make($request->input('password')) ]);
		}

	    //Update data
	    $pegawai->update([
	         'nama_pegawai'         => $request->input('nama_pegawai'),
	         'email_pegawai'        => $request->input('email_pegawai'),
	         'no_telp_pegawai'      => $request->input('no_telp_pegawai'),
	         'nip'					=> $request->input('nip')
	    ]);

	    if (Auth::user()->jabatanable_type == 'App\Staf') {
	    	$staf = Staf::find($pegawai->jabatanable_id);
		    $staf->update([
		    	'id_sektor'				=> $request->input('id_sektor')
		    ]);
	    }

	    $data = Pegawai::find($id);
	    Session::put('data', $data);

	    return redirect()->back();
    }

}

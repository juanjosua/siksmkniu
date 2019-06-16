<?php 

namespace App\Http\Controllers;

use App\Surat;
use App\Disposisi;
use App\Dokumen;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
	public function addImage(request $request, $id){

		Dokumen::create([
            'image' => $request->file('image')->store('gambar'),
            'id_surat' => $id
        ]);

    return redirect('/disposisi');
	}
}
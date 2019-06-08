<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Pegawai;
use App\Pimpinan;
use App\Staf;
use App\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //halaman login
    public function login(){
        return view('admin_login');
    }

    //setelah pencet tombol login
    public function loginPost(Request $request){

        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username',$username)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('username',$data->username);
                Session::put('login',TRUE);
                return redirect('admin_dataPegawai');
            }
            else{
                return redirect('admin')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('admin')->with('alert','Password atau Email, Salah!');
        }
    }

    //logout session flush, redirect to login page
    public function logout(){
        Session::flush();
        return redirect('admin')->with('alert','Kamu sudah logout');
    }

    //data pegawai
    public function dataPegawai()
    {
        //send all user data to data pegawai page
        $dataPegawai = Pegawai::all();
        return view('admin_dataPegawai', compact('dataPegawai'));
    }

    //data surat
    public function dataSurat()
    {
        //send all surat data
        $dataSurat = Surat::all();
        return view('admin_dataSurat', compact('dataSurat'));
    }

    //menjadikan staf pimpinan
    public function promoteUser($id)
    {
        //buat pimpinan baru
        $pimpinan = new Pimpinan();
        $pimpinan->save();
        //locate record pegawai
        $pegawai =  Pegawai::find($id);
        //hapus pegawai dari daftar staf
        $delete = Staf::find($pegawai->jabatanable_id);
        $delete->delete();
        //asosiasi pimpinan baru di tabel pegawai
        $pegawai->jabatanable()->associate($pimpinan);
        $pegawai->save();

        return redirect()->back();
    }

    //menjadikan pimpinan staf
    public function demoteUser($id)
    {
        //buat staf baru
        $staf = new Staf();
        $staf->save();
        //locate record pegawai
        $pegawai =  Pegawai::find($id);
        //hapus pegawai dari daftar pimpinan
        $delete = Pimpinan::find($pegawai->jabatanable_id);
        $delete->delete();
        //asosiasi staf baru di table pegawai
        $pegawai->jabatanable()->associate($staf);
        $pegawai->save();

        return redirect()->back();
    }

    //menghapus akun user
    public function destroyUser($id)
    {
        $pegawai = Pegawai::find($id);
        if ($pegawai->jabatanable_type == 'App\Staf') {
            $delete = Staf::find($pegawai->jabatanable_id);
            $delete->delete();
        } else { 
            $delete = Pimpinan::find($pegawai->jabatanable_id); 
            $delete->delete();
        }  
        $delete = Pegawai::find($id);
        $delete->delete();

        return redirect()->back();
    }

    //menghapus surat
    public function destroySurat($id)
    {
        $delete = Surat::find($id);
        $delete->delete();

        return redirect()->back();
    }

}
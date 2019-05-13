<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Pegawai;
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

        $email = $request->email_admin;
        $password = $request->password;

        $data = Admin::where('email_admin',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('email_admin',$data->email_admin);
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

    //menjadikan pegawai pimpinan
    public function promoteUser($id)
    {
        $promotion = Pegawai::find($id);
        $promotion->jabatan_pegawai = 'pimpinan';
        $promotion->save();

        return redirect()->back();
    }

    //menjadikan pimpinan staf biasa
    public function demoteUser($id)
    {
        $demotion = Pegawai::find($id);
        $demotion->jabatan_pegawai = 'staf';
        $demotion->save();

        return redirect()->back();
    }

    //menghapus akun user
    public function deleteUser($id)
    {
        $delete = Surat::find($id);
        $delete->delete();

        return redirect()->back();
    }

}
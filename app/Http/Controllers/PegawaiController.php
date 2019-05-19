<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    //check if session get login / sudah login atau belum
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('home');
        }
    }

    //halaman login
    public function login(){
        return view('login');
    }

    //setelah pencet tombol login
    public function loginPost(Request $request){

        $email = $request->email_pegawai;
        $password = $request->password;

        $data = Pegawai::where('email_pegawai',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                //home test
                Session::put('nama_pegawai',$data->nama_pegawai);
                Session::put('email_pegawai',$data->email_pegawai);
                Session::put('login',TRUE);
                //put all user data into 1 session variable
                Session::put('data', $data);
                return redirect('unggahSurat');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah!');
        }
    }

    //logout session flush, redirect to login page
    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    //panggil register page
    public function register(Request $request){
        return view('register');
    }

    //setelah pencet tombol register
    public function registerPost(Request $request){
        $this->validate($request, [
            'nama_pegawai' => 'required|min:4',
            'nip' => 'required|unique:pegawais',
            'email_pegawai' => 'required|min:4|email|unique:pegawais',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new Pegawai();
        $data->nama_pegawai = $request->nama_pegawai;
        $data->nip = $request->nip;
        $data->email_pegawai = $request->email_pegawai;
        $data->no_telp_pegawai = $request->no_telp_pegawai;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }
}
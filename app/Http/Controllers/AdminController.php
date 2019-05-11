<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin_dataPegawai');
    }

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
}
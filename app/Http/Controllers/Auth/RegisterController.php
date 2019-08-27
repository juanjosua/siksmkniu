<?php

namespace App\Http\Controllers\Auth;

use App\Pegawai;
use App\Staf;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $email = Auth::user()->email_pegawai;
        $data = Pegawai::where('email_pegawai', $email)->first();
        Session::put('data', $data);
        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_pegawai' => ['required', 'string', 'max:255'],
            'email_pegawai' => ['required', 'string', 'email', 'max:255', 'unique:pegawais'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $staf = new Staf();
        $staf->save();

        $pegawai =  new Pegawai();
        $pegawai->nama_pegawai = $data['nama_pegawai'];
        $pegawai->email_pegawai = $data['email_pegawai'];
        $pegawai->password = Hash::make($data['password']);
        $pegawai->jabatanable()->associate($staf);
        $pegawai->save();

        return $pegawai;
    }
}

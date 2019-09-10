<?php

use App\Pegawai;
use App\Staf;
use App\Pimpinan;
use App\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seeder admin
        DB::table('superadmins')->insert([
            'username' => 'superadmin',
            'password' => bcrypt('superadmin')
        ]);

        //seeder instansi 1
        DB::table('instansis')->insert([
            'nama_instansi' => 'Kementerian Luar Negeri'
        ]);

        //seeder instansi 2
        DB::table('instansis')->insert([
            'nama_instansi' => 'Kementerian Kesehatan'
        ]);

        //seeder sektor 1
        DB::table('sektors')->insert([
            'nama_sektor' => 'Pendidikan'
        ]);

        //seeder sektor 2
        DB::table('sektors')->insert([
            'nama_sektor' => 'Kebudayaan'
        ]);

        //seeder sektor 3
        DB::table('sektors')->insert([
            'nama_sektor' => 'Ilmu Pengetahuan'
        ]);

        //seeder sektor 4
        DB::table('sektors')->insert([
            'nama_sektor' => 'Komunikasi dan Informasi'
        ]);

        //seeder sektor 5
        DB::table('sektors')->insert([
            'nama_sektor' => 'Lainnya'
        ]);

        //seeder staf baru
        $staf = new Staf();
        $staf->save();
        $pegawai =  new Pegawai();
        $pegawai->nama_pegawai = 'Staf';
        $pegawai->email_pegawai = 'donna@gmail.com';
        $pegawai->password = Hash::make('secret');
        $pegawai->jabatanable()->associate($staf);
        $pegawai->save();

        //seeder admin baru
        $admin = new Admin();
        $admin->save();
        $pegawai =  new Pegawai();
        $pegawai->nama_pegawai = 'Admin';
        $pegawai->email_pegawai = 'karna@gmail.com';
        $pegawai->password = Hash::make('secret');
        $pegawai->jabatanable()->associate($admin);
        $pegawai->save();

        //seeder pimpinan baru
        $pimpinan = new Pimpinan();
        $pimpinan->save();
        $pegawai =  new Pegawai();
        $pegawai->nama_pegawai = 'Pimpinan';
        $pegawai->email_pegawai = 'desi@gmail.com';
        $pegawai->password = Hash::make('secret');
        $pegawai->jabatanable()->associate($pimpinan);
        $pegawai->save();
    }
}

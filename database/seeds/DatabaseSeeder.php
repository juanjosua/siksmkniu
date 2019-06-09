<?php

use App\Pegawai;
use App\Staf;
use App\Pimpinan;
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
        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin')
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

        //seeder staf baru
        $staf = new Staf();
        $staf->save();
        $pegawai =  new Pegawai();
        $pegawai->nama_pegawai = 'Donna';
        $pegawai->nip = '3275052410960014';
        $pegawai->email_pegawai = 'donna@gmail.com';
        $pegawai->no_telp_pegawai = '0821128747595';
        $pegawai->password = bcrypt('secret');
        $pegawai->jabatanable()->associate($staf);
        $pegawai->save();

        //seeder pimpinan baru
        $pimpinan = new Pimpinan();
        $pimpinan->save();
        $pegawai =  new Pegawai();
        $pegawai->nama_pegawai = 'Danu';
        $pegawai->nip = '3275051010970014';
        $pegawai->email_pegawai = 'danu@gmail.com';
        $pegawai->no_telp_pegawai = '0821128740987';
        $pegawai->password = bcrypt('secret');
        $pegawai->jabatanable()->associate($pimpinan);
        $pegawai->save();

    }
}

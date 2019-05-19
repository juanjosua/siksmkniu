<?php

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
        // $this->call(UsersTableSeeder::class);
        DB::table('admins')->insert([
            'email_admin' => 'admin@gmail.com',
            'password' => bcrypt('secret')
        ]);

        DB::table('pegawais')->insert([
            'nama_pegawai' => 'Donna',
            'nip' => Str::random(10),
            'no_telp_pegawai' => Str::random(10),
            'email_pegawai' => 'staff@gmail.com',
            'jabatan_pegawai' => 'staff',
            'password' => bcrypt('secret'),
            'created_at' => '2019-05-15 16:40:53'
        ]);

        DB::table('pegawais')->insert([
            'nama_pegawai' => 'Desi',
            'nip' => Str::random(10),
            'no_telp_pegawai' => Str::random(10),
            'email_pegawai' => 'pimpinan@gmail.com',
            'jabatan_pegawai' => 'pimpinan',
            'password' => bcrypt('secret'),
            'created_at' => '2019-05-15 16:40:53'
        ]);
    }
}

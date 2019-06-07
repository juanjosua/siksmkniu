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
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        DB::table('pegawais')->insert([
            'nama_pegawai' => 'Donna',
            'nip' => Str::random(10),
            'no_telp_pegawai' => Str::random(10),
            'email_pegawai' => 'staff@gmail.com',
            'password' => bcrypt('secret'),
            'jabatan_id' => 1,
            'jabatan_type' => 'staf',
            'created_at' => '2019-05-15 16:40:53'
        ]);

        DB::table('pegawais')->insert([
            'nama_pegawai' => 'Desi',
            'nip' => Str::random(10),
            'no_telp_pegawai' => Str::random(10),
            'email_pegawai' => 'pimpinan@gmail.com',
            'password' => bcrypt('secret'),
            'jabatan_id' => 1,
            'jabatan_type' => 'pimpinan',
            'created_at' => '2019-05-15 16:40:53'
        ]);

        DB::table('pimpinans')->insert([
            'id_pimpinan' => 1
        ]);

        DB::table('stafs')->insert([
            'id_staf' => 1
        ]);
    }
}

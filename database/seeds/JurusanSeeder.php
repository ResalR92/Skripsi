<?php

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
        	['nama'=>'Teknik Permesinan'],
        	['nama'=>'Teknik Kendaraan Ringan'],
        	['nama'=>'Administrasi Perkantoran'],
        	['nama'=>'Teknik Komputer Jaringan'],
        ];

        //Masukkan data ke database
        DB::table('jurusan')->insert($jurusan);
    }
}

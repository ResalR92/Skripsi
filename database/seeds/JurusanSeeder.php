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
        	['nama'=>'Teknik Permesinan','kapasitas'=>30],
        	['nama'=>'Teknik Kendaraan Ringan','kapasitas'=>31],
        	['nama'=>'Administrasi Perkantoran','kapasitas'=>34],
        	['nama'=>'Teknik Komputer Jaringan','kapasitas'=>32],
        ];

        //Masukkan data ke database
        DB::table('jurusan')->insert($jurusan);
    }
}

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
        	['nama'=>'teknik permesinan','kapasitas'=>30],
        	['nama'=>'teknik kendaraan ringan','kapasitas'=>31],
        	['nama'=>'administrasi perkantoran','kapasitas'=>34],
        	['nama'=>'teknik komputer jaringan','kapasitas'=>32],
        ];

        //Masukkan data ke database
        DB::table('jurusan')->insert($jurusan);
    }
}

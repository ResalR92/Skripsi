<?php

use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jadwal = [
        	['kegiatan'=>'Pendaftaran','awal'=>'2017-05-25 18:32:40','akhir'=>'2017-06-25 18:32:40'],
        	['kegiatan'=>'Verifikasi','awal'=>'2017-06-25 18:32:40','akhir'=>'2017-07-06 18:32:40'],
        	['kegiatan'=>'Pengumuman','awal'=>'2017-07-07 18:32:40','akhir'=>'2017-07-07 18:32:40'],
        	['kegiatan'=>'Her-registrasi','awal'=>'2017-07-07 18:32:40','akhir'=>'2017-07-17 18:32:40'],
        ];

        //Masukkan data ke database
        DB::table('jadwal')->insert($jadwal);
    }
}

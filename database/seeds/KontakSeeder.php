<?php

use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kontak = [
        	['nama'=>'Resal Ramdahadi','email'=>'resalramdahadi92@gmail.com','judul'=>'Lupa Password','isi'=>'Admin, tolong kirim password akun saya ke email, trims.','dibalas'=>true,'created_at'=>'2017-01-07 00:00:00','updated_at'=>'2017-01-07 00:00:00'],
        	['nama'=>'M. Ghufron A.','email'=>'gufron@mail.com','judul'=>'Info Terbaru Kelulusan','isi'=>'Admin, apakah saya sudah diterima di SMK Panjatek, trims.','dibalas'=>false,'created_at'=>'2017-01-08 00:00:00','updated_at'=>'2017-01-08 00:00:00'],
        	['nama'=>'Franco Escobar','email'=>'franco@mail.com','judul'=>'Info Terbaru Kelulusan','isi'=>'Admin, apakah saya sudah diterima di SMK Panjatek, trims.','dibalas'=>true,'created_at'=>'2017-01-09 00:00:00','updated_at'=>'2017-01-09 00:00:00'],
        ];

        //Masukkan data ke database
        DB::table('kontak')->insert($kontak);
    }
}

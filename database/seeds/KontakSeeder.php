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
        	['nama'=>'Resal Ramdahadi','email'=>'resalramdahadi92@gmail.com','judul'=>'Lupa Password','isi'=>'Admin, tolong kirim password akun saya ke email, trims.','dibalas'=>true],
        	['nama'=>'M. Ghufron A.','email'=>'gufron@mail.com','judul'=>'Info Terbaru Kelulusan','isi'=>'Admin, apakah saya sudah diterima di SMK Panjatek, trims.','dibalas'=>false],
        	['nama'=>'Franco Escobar','email'=>'franco@mail.com','judul'=>'Info Terbaru Kelulusan','isi'=>'Admin, apakah saya sudah diterima di SMK Panjatek, trims.','dibalas'=>true],
        ];

        //Masukkan data ke database
        DB::table('kontak')->insert($kontak);
    }
}

<?php

use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengumuman = [
        	['judul'=>'Cara Update Data #1','isi'=>'Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.'],
        	['judul'=>'Cara Update Data #2','isi'=>'Bagi anda yang belum tahu cara #2 mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.'],
        	
        ];

        //Masukkan data ke database
        DB::table('pengumuman')->insert($pengumuman);
    }
}

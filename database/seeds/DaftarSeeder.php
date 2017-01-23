<?php

use Illuminate\Database\Seeder;

class DaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar = [
        	['nama'=>'Daftar','aktif'=>1],
        ];
        //Masukkan data ke database
        DB::table('daftar')->insert($daftar);
    }
}

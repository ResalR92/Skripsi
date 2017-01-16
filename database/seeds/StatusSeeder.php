<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
        	['nama'=>'Menunggu Verifikasi','label'=>'info'],
        	['nama'=>'Data Tidak Valid','label'=>'warning'],
        	['nama'=>'Data Valid','label'=>'primary'],
        	['nama'=>'Tidak Lulus','label'=>'danger'],
        	['nama'=>'Lulus','label'=>'lulus'],
        ];

        //Masukkan data ke database
        DB::table('status')->insert($status);
    }
}

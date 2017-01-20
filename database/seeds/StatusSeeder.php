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
        	['nama'=>'Baru','label'=>'info','pesan'=>'Sedang diverifikasi'],
        	['nama'=>'Tidak Valid','label'=>'warning','pesan'=>'Mohon lengkapi atau perbaiki biodata'],
            ['nama'=>'Perbaikan','label'=>'info','pesan'=>'Sedang diverifikasi ulang'],
        	['nama'=>'Valid','label'=>'primary','pesan'=>'Silahkan Cetak Form Pendaftaran untuk Pendaftaran Ulang. Menunggu keputusan Lulus/Tidak Lulus'],
        	['nama'=>'Tidak Lulus','label'=>'danger','pesan'=>'Mohon maaf, Anda tidak memenuhi persyaratan.'],
        	['nama'=>'Lulus','label'=>'success','pesan'=>'Selamat, Anda telah diterima di SMK Panjatek'],
        ];

        //Masukkan data ke database
        DB::table('status')->insert($status);
    }
}

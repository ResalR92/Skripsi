<?php

use Illuminate\Database\Seeder;

class ProsedurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prosedur = [
        	['judul'=>'1. Pendaftaran','isi'=>' Calon peserta melakukan pendaftaran pada website PSB Online, melalui halaman Pendaftaran.'],
        	['judul'=>'2. Mengisi biodata','isi'=>'Melengkapi biodata dengan sebelumnya melakukan login dengan username dan password yang sudah diberikan.
'],
        	['judul'=>'3. Mencetak Biodata','isi'=>'Biodata dan data nilai yang sudah dilengkapi kemudian dicetak di kertas A4. Untuk mencetak, masuk ke menu cetak. Menu ini akan tampil jika Anda sudah login.'],
        	['judul'=>'4. Verifikasi data','isi'=>'Setelah melengkapi biodata, calon siswa dan orang tua melakukan verifikasi data dengan cara mendatangi sekretariat PSB di SMK Panjatek dan melengkapi semua berkas yang diperlukan.'],
        	['judul'=>'5. Pengumuman Hasil Ujian','isi'=>'Pengumuman hasil seleksi akan diumumkan pada waktu yang telah ditentukan.'],
        	['judul'=>'6. Her-registrasi','isi'=>'Peserta yang dinyatakan LULUS Ujian Seleksi, melakukan Her-registrasi dengan mendatangi Sekretariat PSB di SMK Panjatek. Peserta yang dinyatakan LULUS namun tidak melakukan Her-registrasi sampai batas waktu yang ditentukan, akan dinyatakan gugur / mengundurkan diri.'],
        ];

        //Masukkan data ke database
        DB::table('prosedur')->insert($prosedur);
    }
}

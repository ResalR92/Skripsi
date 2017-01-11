<?php

use Illuminate\Database\Seeder;
use App\Peserta;
use App\Ayah;
use App\Ibu;
use App\Wali;
use App\Sekolah;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat sample peserta
    	$paulus = new Peserta();
    	$paulus->id = 1;
    	$paulus->id_jurusan = 1;
    	$paulus->nama = 'Paulus';
    	$paulus->tempat_lahir = 'Tarsus';
    	$paulus->tanggal_lahir = '1998-08-08';
    	$paulus->jenis_kelamin = 'L';
    	$paulus->agama = 'Kristen';
    	$paulus->alamat = 'Jln. Tarsus, Indonesia';
    	$paulus->telepon = '02124020675';
    	$paulus->no_hp = '082124020675';
    	$paulus->tahun_lulus = '2015';
    	$paulus->foto = '';
    	$paulus->verifikasi = '1';
    	$paulus->lulus = '1';
    	$paulus->save();

    	//membuat sample ayah
    	$ayah_paulus = new Ayah();
    	$ayah_paulus->id_peserta = $paulus->id;
    	$ayah_paulus->nama = 'Ayah Paulus';
    	$ayah_paulus->tempat_lahir = 'Roma';
    	$ayah_paulus->tanggal_lahir= '1960-06-01';
    	$ayah_paulus->pendidikan = 'S1';
    	$ayah_paulus->pekerjaan = 'Wiraswasta';
    	$ayah_paulus->gaji = '15000000';
    	$ayah_paulus->telepon = '02124020675';
    	$ayah_paulus->no_hp = '082124020675';
    	$ayah_paulus->alamat = 'Jln. Roma-Tarsus dekat Kilikia, Indonesia';
    	$ayah_paulus->save();

    	//membuat sample ibu
    	$ibu_paulus = new Ibu();
    	$ibu_paulus->id_peserta = $paulus->id;
    	$ibu_paulus->nama = 'Ibu Paulus';
    	$ibu_paulus->tempat_lahir = 'Roma';
    	$ibu_paulus->tanggal_lahir= '1971-03-02';
    	$ibu_paulus->pendidikan = 'SMA';
    	$ibu_paulus->pekerjaan = 'Ibu Rumah Tangga';
    	$ibu_paulus->telepon = '02124020675';
    	$ibu_paulus->no_hp = '082124020675';
    	$ibu_paulus->alamat = 'Jln. Roma-Tarsus dekat Kilikia, Indonesia';
    	$ibu_paulus->save();

    	//membuat sample wali
    	$wali_paulus = new Wali();
    	$wali_paulus->id_peserta = $paulus->id;
    	$wali_paulus->nama = 'Wali Paulus';
    	$wali_paulus->tempat_lahir = 'Roma';
    	$wali_paulus->tanggal_lahir= '1992-05-30';
    	$wali_paulus->pendidikan = 'SMA';
    	$wali_paulus->pekerjaan = 'Mahasiswa';
    	$wali_paulus->telepon = '02124020675';
    	$wali_paulus->no_hp = '082124020675';
    	$wali_paulus->alamat = 'Jln. Roma-Tarsus dekat Kilikia, Indonesia';
    	$wali_paulus->save();

    	//membuat sample Sekolah
    	$sekolah_paulus = new Sekolah();
    	$sekolah_paulus->id_peserta = $paulus->id;
    	$sekolah_paulus->nama = 'SMP N 1 Gamaliel';
    	$sekolah_paulus->alamat = 'Jln. Roma-Tarsus-Israel, Indonesia';
    	$sekolah_paulus->save();

    	//membuat sample peserta
    	$yakobus = new Peserta();
    	$yakobus->id = 2;
    	$yakobus->id_jurusan = 2;
    	$yakobus->nama = 'Yakobus';
    	$yakobus->tempat_lahir = 'Galilea';
    	$yakobus->tanggal_lahir = '1998-08-08';
    	$yakobus->jenis_kelamin = 'L';
    	$yakobus->agama = 'Kristen';
    	$yakobus->alamat = 'Jln. Galilea, Indonesia';
    	$yakobus->telepon = '02124020675';
    	$yakobus->no_hp = '082124020675';
    	$yakobus->tahun_lulus = '2015';
    	$yakobus->foto = '';
    	$yakobus->verifikasi = '1';
    	$yakobus->lulus = '0';
    	$yakobus->save();

    	//membuat sample ayah
    	$ayah_yakobus = new Ayah();
    	$ayah_yakobus->id_peserta = $yakobus->id;
    	$ayah_yakobus->nama = 'Ayah Yakobus';
    	$ayah_yakobus->tempat_lahir = 'Roma';
    	$ayah_yakobus->tanggal_lahir= '1960-06-01';
    	$ayah_yakobus->pendidikan = 'S1';
    	$ayah_yakobus->pekerjaan = 'Wiraswasta';
    	$ayah_yakobus->gaji = '15000000';
    	$ayah_yakobus->telepon = '02124020675';
    	$ayah_yakobus->no_hp = '082124020675';
    	$ayah_yakobus->alamat = 'Jln. Galilea, Indonesia';
    	$ayah_yakobus->save();

    	//membuat sample ibu
    	$ibu_yakobus = new Ibu();
    	$ibu_yakobus->id_peserta = $yakobus->id;
    	$ibu_yakobus->nama = 'Ibu Yakobus';
    	$ibu_yakobus->tempat_lahir = 'Roma';
    	$ibu_yakobus->tanggal_lahir= '1971-03-02';
    	$ibu_yakobus->pendidikan = 'SMA';
    	$ibu_yakobus->pekerjaan = 'Ibu Rumah Tangga';
    	$ibu_yakobus->telepon = '02124020675';
    	$ibu_yakobus->no_hp = '082124020675';
    	$ibu_yakobus->alamat = 'Jln. Galilea, Indonesia';
    	$ibu_yakobus->save();

    	//membuat sample wali
    	$wali_yakobus = new Wali();
    	$wali_yakobus->id_peserta = $yakobus->id;
    	$wali_yakobus->nama = 'Wali Yakobus';
    	$wali_yakobus->tempat_lahir = 'Roma';
    	$wali_yakobus->tanggal_lahir= '1992-05-30';
    	$wali_yakobus->pendidikan = 'SMA';
    	$wali_yakobus->pekerjaan = 'Mahasiswa';
    	$wali_yakobus->telepon = '02124020675';
    	$wali_yakobus->no_hp = '082124020675';
    	$wali_yakobus->alamat = 'Jln. Galilea, Indonesia';
    	$wali_yakobus->save();

    	//membuat sample Sekolah
    	$sekolah_yakobus = new Sekolah();
    	$sekolah_yakobus->id_peserta = $yakobus->id;
    	$sekolah_yakobus->nama = 'SMP N 1 Galilea';
    	$sekolah_yakobus->alamat = 'Jln. Galilea, Indonesia';
    	$sekolah_yakobus->save();
    }
}

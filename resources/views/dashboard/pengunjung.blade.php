@extends('layouts.peserta')
@section('content')
    <div class="container">
        <div class="jumbotron" style="opacity:0.8;">
        <h2 class="h1">Selamat Datang!</h2>
        <p>
            Selamat datang di website <strong>Penerimaan Siswa Baru (PSB) SMK Panjatek Bekasi</strong>. Sebelum melakukan pendaftaran,
            sebaiknya Anda menyimak prosedur pendaftaran siswa baru di halaman {{ link_to('/prosedur','Prosedur Pendaftaran') }}.
        </p>
        <p>
            Pastikan juga anda juga mengetahui jadwal PSB di halaman {{ link_to('/jadwal','Jadwal') }}.
            Semua informasi terbaru mengenai PSB Online SMP Putih Biru bisa anda lihat di halaman {{ link_to('/pengumuman','Pengumuman') }}.
        </p>
        <p>Anda juga dapat mengetahui data pendaftar di SMP Putih Biru di halaman {{ link_to('/peserta','Peserta') }}.</p>
        <p>Jika Anda sudah memahami prosedur pendaftaran, silakan klik tombol "<strong>Daftar</strong>" di bawah ini!</p>
        <p>{{ link_to('/register','Daftar',['class'=>'btn btn-primary btn-lg']) }}</p>
    </div>
    </div>
@stop
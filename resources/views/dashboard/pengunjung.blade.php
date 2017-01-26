@extends('layouts.peserta')
@section('content')
    <div class="container">
        @include('_partial.flash_message')
        @if(empty($daftar))
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Pendaftaran <small><span class="label label-danger">DITUTUP</span></small>
                    </h1>
                </div>
                <h4>Mohon maaf, Pendaftaran Peserta PSB SMK Panjatek sudah ditutup.</h4>
                <h4>Bagi Peserta yang sudah mendaftar, silahkan {{ link_to('/login','Login',['class'=>'btn btn-success']) }} untuk mengetahui informasi Status Pendaftaran Anda yang lebih detail</h4>
            </div>
        @else
            <div class="jumbotron">
                <h2 class="h1">Selamat Datang!</h2>
                <p>
                    Selamat datang di website <strong>Penerimaan Siswa Baru (PSB) SMK Panjatek Bekasi</strong>. <br>Sebelum melakukan pendaftaran,
                    sebaiknya Anda menyimak prosedur pendaftaran siswa baru di halaman {{ link_to('/prosedur','Prosedur Pendaftaran') }}.
                </p>
                <p>
                    Pastikan juga anda juga mengetahui jadwal PSB di halaman {{ link_to('/jadwal','Jadwal') }}.
                    <br>Semua informasi terbaru mengenai PSB Online SMK Panjatek bisa anda lihat di halaman {{ link_to('/pengumuman','Pengumuman') }}.
                </p>
                <p>Anda juga dapat mengetahui Data Peserta di SMK Panjatek di halaman {{ link_to('/peserta','Peserta') }}.</p>
                <p>Jika Anda sudah memahami prosedur pendaftaran, silakan klik tombol "<strong>Daftar</strong>" di bawah ini!</p>
                <p>{{ link_to('/register','Daftar',['class'=>'btn btn-primary btn-lg']) }}</p>
            </div>
        @endif
    </div>
@stop

@extends('layouts.peserta')
@section('content')
    <div class="container">
        @include('_partial.flash_message')
        @if(empty($daftar))
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container">                
                        <h1><b>Pendaftaran</b> <span class="label label-danger">DITUTUP</span></h1>
                        <hr>
                        <h4>Mohon maaf, Pendaftaran Peserta PSB SMK Panjatek sudah ditutup.</h4>
                        <h4>Bagi Peserta yang sudah mendaftar, silahkan {{ link_to('/login','Login',['class'=>'btn btn-success']) }} untuk mengetahui informasi Status Pendaftaran Anda yang lebih detail</h4>
                    </div>
                </div>
            </div>
        @else
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container">
                        <div class="col-md-12">
                        <h1><b><u>Selamat Datang!</u></b></h1> 
                        <h3>
                            Selamat datang di website <strong>Penerimaan Siswa Baru (PSB) SMK Panjatek Bekasi</strong>. <br>Sebelum melakukan pendaftaran,
                            sebaiknya Anda menyimak prosedur pendaftaran siswa baru di halaman {{ link_to('/prosedur','Prosedur Pendaftaran') }}.
                        </h3>
                        <h3>
                            Pastikan juga anda juga mengetahui jadwal PSB di halaman {{ link_to('/jadwal','Jadwal') }}.
                            <br>Semua informasi terbaru mengenai PSB Online SMK Panjatek bisa anda lihat di halaman {{ link_to('/pengumuman','Pengumuman') }}.
                        </h3>
                        <h3>Anda juga dapat mengetahui Data Peserta di SMK Panjatek di halaman {{ link_to('/peserta','Peserta') }}.</h3>
                        <h3>Jika Anda sudah memahami prosedur pendaftaran, silakan klik tombol "<strong>Daftar</strong>" di bawah ini!</h3>
                        <p>{{ link_to('/register','Daftar',['class'=>'btn btn-primary btn-lg']) }}</p>
                        {{-- </h4> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop

@section('footer')
    @include('layouts.footer')
@endsection

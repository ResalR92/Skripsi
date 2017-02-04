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
                        <div class="row">
                          <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                             <img src="{{ asset('images/curriculum.png') }}" width="200" height="250" alt="">
                              <div class="caption">
                                <h2>Status Pendaftaran</h2>
                                <p style="font-size:17px">Bagi Peserta yang sudah mendaftar, silahkan <strong>Login</strong> untuk mengetahui informasi Status Pendaftaran Anda yang lebih detail.</p>
                                <p>{{ link_to('/login','Login',['class'=>'btn btn-success']) }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <h1>Selamat datang <br><small>di website <strong>Penerimaan Siswa Baru (PSB)</strong> SMK Panjatek Bekasi</small></h1> 
                            <hr>
                            <div class="row">
                              <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                 <img src="{{ asset('images/list.png') }}" width="200" height="250" alt="">
                                  <div class="caption">
                                    <h2>Prosedur</h2>
                                    <p style="font-size:17px">Sebelum melakukan pendaftaran, sebaiknya Anda menyimak prosedur pendaftaran siswa baru.</p>
                                    <p>{{ link_to('/prosedur','Selengkapnya',['class'=>'btn btn-primary']) }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 col-md-3 clearfix">
                                <div class="thumbnail">
                                 <img src="{{ asset('images/calendar.png') }}" width="200" height="250" alt="">
                                  <div class="caption">
                                    <h2>Jadwal</h2>
                                    <p style="font-size:17px">Pastikan juga anda juga mengetahui Jadwal PSB dengan tepat.<br><br></p>
                                    
                                    <p>{{ link_to('/jadwal','Selengkapnya',['class'=>'btn btn-primary']) }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                 <img src="{{ asset('images/text-lines.png') }}" width="200" height="250" alt="">
                                  <div class="caption">
                                    <h2>Pengumuman</h2>
                                    <p style="font-size:17px">Semua informasi terbaru mengenai PSB Online SMK Panjatek bisa anda lihat di halaman ini.</p>
                                    <p>{{ link_to('/pengumuman','Selengkapnya',['class'=>'btn btn-primary']) }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                 <img src="{{ asset('images/student.png') }}" width="200" height="250" alt="">
                                  <div class="caption">
                                    <h2>Data Peserta</h2>
                                    <p style="font-size:17px">Anda juga dapat mengetahui Data Peserta di SMK Panjatek di halaman ini.</p>
                                    <p>{{ link_to('/peserta','Selengkapnya',['class'=>'btn btn-primary']) }}</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                 <img src="{{ asset('images/notepad.png') }}" width="200" height="250" alt="">
                                  <div class="caption">
                                    <h2>Pendaftaran</h2>
                                    <p style="font-size:17px">Jika Anda sudah memahami prosedur pendaftaran, silakan klik tombol "<strong>Daftar</strong>" di bawah ini!</p>
                                    <p>{{ link_to('/register','Daftar',['class'=>'btn btn-success btn-lg']) }}</p>
                                  </div>
                                </div>
                              </div>
                            </div>
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

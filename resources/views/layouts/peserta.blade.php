<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />
    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hidden-xs hidden-sm">
                    <div class="row">
                        <div class="col-md-3">
                            {!! Html::image(asset('images/logo.png'),null,['class'=>'img-rounded img-responsive','width'=>'100px']) !!}
                        </div>
                        <div class="col-md-">
                            <h2><strong>Penerimaan Siswa Baru Online</strong></h2>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 hidden-xs hidden-sm">
                    <address>
                        <h5><strong>SMK Panjatek</strong><br></h5>
                        Jln. Lingkar Luar No.99, Kaliabang Tengah, Bekasi Utara - 17123 <br>
                        Telepon 021-88981110. Email: admin@panjatek.sch.id<br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="visible-xs-block visible-sm-block">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <b>PSB</b> SMK Panjatek
                    </a>
                    {!! Html::image(asset('images/logo.png'),null,['class'=>'img-rounded img-responsive','width'=>'50px']) !!}
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        @if(!empty($halaman) && $halaman == '/')
                            <li class="active"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> Home <span class="sr-only">(current)</span> </a> </li>
                        @else
                            <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        @endif
                        @if(!empty($halaman) && $halaman == 'peserta')
                            <li class="active"><a href="{{ url('peserta') }}"><span class="glyphicon glyphicon-list-alt"></span> Peserta <span class="sr-only">(current)</span> </a> </li>
                        @else
                            <li><a href="{{ url('peserta') }}"><span class="glyphicon glyphicon-list-alt"></span> Peserta</a></li>
                        @endif
                        @if (!Auth::check())
                            @if(!empty($halaman) && $halaman == 'register')
                                <li class="active"><a href="{{ url('register') }}"><span class="glyphicon glyphicon-pencil"></span> Pendaftaran <span class="sr-only">(current)</span> </a> </li>
                            @else
                                <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-pencil"></span> Pendaftaran</a></li>
                            @endif
                        @endif
                        @if(!empty($halaman) && $halaman == 'informasi')
                            <li class="dropdown active">
                        @else
                            <li class="dropdown">
                        @endif
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-info-sign"></span> Informasi
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('pengumuman') }}"><span class="glyphicon glyphicon-bullhorn"></span> Pengumuman</a></li>
                                    <li><a href="{{ url('prosedur') }}"><span class="glyphicon glyphicon-sort"></span> Prosedur</a></li>
                                    <li><a href="{{ url('jadwal') }}"><span class="glyphicon glyphicon-calendar"></span> Jadwal</a></li>
                                </ul>
                            </li>
                        @if(!empty($halaman) && $halaman == 'bantuan')
                            <li class="dropdown active">
                        @else
                            <li class="dropdown">
                        @endif
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-question-sign"></span> Bantuan
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('kontak') }}"><span class="glyphicon glyphicon-envelope"></span> Kontak</a></li>
                                </ul>
                            </li>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            @if(!empty($halaman) && $halaman == 'login')
                                <li class="active">
                            @else
                                <li>
                            @endif
                                <a href="{{ url('/login') }}"><b>Login</b></a></li>
                        @else
                            @if(!empty($halaman) && $halaman == 'ubahpwd')
                                <li class="dropdown active">
                            @else
                                <li class="dropdown">
                            @endif
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('setting/password') }}">
                                            <i class="fa fa-btn fa-lock"></i> Ubah Password
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-btn fa-power-off"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    @yield('footer')
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/laravelapp.js') }}"></script>
    @yield('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
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
                    <b><a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a></b>
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
                            @if(!empty($halaman) && $halaman == 'pendaftaran')
                                <li class="active"><a href="{{ url('pendaftaran') }}"><span class="glyphicon glyphicon-pencil"></span> Pendaftaran <span class="sr-only">(current)</span> </a> </li>
                            @else
                                <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-pencil"></span> Pendaftaran</a></li>
                            @endif

                            @if(!empty($halaman) && $halaman == 'hasil_seleksi')
                                <li class="active"><a href="{{ url('peserta') }}"><span class="glyphicon glyphicon-flag"></span> Hasil Seleksi <span class="sr-only">(current)</span> </a> </li>
                            @else
                                <li><a href="{{ url('hasil_seleksi') }}"><span class="glyphicon glyphicon-flag"></span> Hasil Seleksi</a></li>
                            @endif
                        @endif
                        @if(Auth::check() && (Auth::user()->level == 'operator' || Auth::user()->level == 'admin'))
                            @if(!empty($halaman) && $halaman == 'jurusan')
                                <li class="active"><a href="{{ url('jurusan') }}"><span class="glyphicon glyphicon-education"></span> Jurusan <span class="sr-only">(current)</span> </a> </li>
                            @else
                                <li><a href="{{ url('jurusan') }}"><span class="glyphicon glyphicon-education"></span> Jurusan</a></li>
                            @endif
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-info-sign"></span> Informasi
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('pengumuman') }}"><span class="glyphicon glyphicon-bullhorn"></span> Pengumuman</a></li>
                                <li><a href="{{ url('prosedur') }}"><span class="glyphicon glyphicon-sort"></span> Prosedur</a></li>
                                <li><a href="{{ url('jadwal') }}"><span class="glyphicon glyphicon-calendar"></span> Jadwal</a></li>
                            </ul>
                        </li>
                        @if (!Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-question-sign"></span> Bantuan
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('kontak/create') }}"><span class="glyphicon glyphicon-envelope"></span> Kontak</a></li>
                                    {{--<li><a href="{{ url('auth.password') }}"><span class="glyphicon glyphicon-barcode"></span> Lupa Password</a></li>--}}
                                </ul>
                            </li>
                        @endif
                        @if(Auth::check() && Auth::user()->level == 'peserta')
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span> Akun Saya
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('biodata') }}"><span class="glyphicon glyphicon-book"></span> Biodata</a></li>
                                    <li><a href="{{ url('biodata') }}"><span class="glyphicon glyphicon-print"></span> Cetak Biodata</a></li><!-- nanti dimasukkan ke show -->
                                </ul>
                            </li>
                        @endif
                        @if(Auth::check() && (Auth::user()->level == 'operator' || Auth::user()->level == 'admin'))
                            @if(!empty($halaman) && $halaman == 'kontak')
                                <li class="active"><a href="{{ url('kontak') }}"><span class="glyphicon glyphicon-envelope"></span> Kontak <span class="sr-only">(current)</span> </a> </li>
                            @else
                                <li><a href="{{ url('kontak') }}"><span class="glyphicon glyphicon-envelope"></span> Kontak</a></li>
                            @endif
                        @endif

                        @if(Auth::check() && Auth::user()->level == 'admin')
                            @if(!empty($halaman) && $halaman == 'user')
                                <li class="active"><a href="{{ url('user') }}"><span class="glyphicon glyphicon-user"></span> User <span class="sr-only">(current)</span> </a> </li>
                            @else
                                <li><a href="{{ url('user') }}"><span class="glyphicon glyphicon-user"></span> User</a></li>
                            @endif
                        @endif

                        @if(Auth::check() && (Auth::user()->level == 'operator' || Auth::user()->level == 'admin'))
                            @if(!empty($halaman) && $halaman == 'myadmin')
                                <li class="active"><a href="{{ url('myadmin') }}"><span class="glyphicon glyphicon-user"></span> MyAdmin <span class="sr-only">(current)</span> </a> </li>
                            @else
                                <li><a href="{{ url('myadmin') }}"><span class="glyphicon glyphicon-user"></span> MyAdmin</a></li>
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}"><b>Login</b></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('setting/password') }}">
                                            <i class="fa fa-btn fa-lock"></i> Ubah Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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
    <div id="footer">
        <p>&copy; 2016 www.psb.smkpanjatek.sch.id</p>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/laravelapp.js') }}"></script>
    @yield('scripts')
</body>
</html>

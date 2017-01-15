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
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Dashboard PSB SMK Panjatek</a>
        </div>
        <!-- Top Menu Items -->
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Daftar</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
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
        </div
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="{{ url('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li >
                    <a href="{{ url('admin/peserta') }}"><i class="fa fa-fw fa-book"></i> Peserta</a>
                </li>
                <li >
                    <a href="{{ url('admin/jurusan') }}"><i class="fa fa-fw fa-th-large"></i> Jurusan</a>
                </li>
                <li >
                    <a href="{{ url('admin/pengumuman') }}"><i class="fa fa-fw fa-th-large"></i> Pengumuman</a>
                </li>
                <li >
                    <a href="{{ url('admin/prosedur') }}"><i class="fa fa-fw fa-th-large"></i> Prosedur</a>
                </li>
                <li >
                    <a href="{{ url('admin/jadwal') }}"><i class="fa fa-fw fa-th-large"></i> Jadwal</a>
                </li>
                <li >
                    <a href="{{ url('admin/kontak') }}"><i class="fa fa-fw fa-th-large"></i> Kontak</a>
                </li>
                <li >
                    <a href="{{ url('admin/operator') }}"><i class="fa fa-fw fa-th-large"></i> Operator</a>
                </li>
                <li >
                    <a href="#"><i class="fa fa-fw fa-th-large"></i> My Admin</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/laravelapp.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: ".editor"
        });
    </script>
    @yield('scripts')
</body>
</html>

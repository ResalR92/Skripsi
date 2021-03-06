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
                <a class="navbar-brand" href="{{ url('admin') }}"><b>Administrator PSB</b> SMK Panjatek</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav top-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Daftar</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>   
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('admin/password') }}">
                                     <i class="fa fa-btn fa-lock"></i> Ubah Password
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                @if(!empty($dashboard) && $dashboard == 'admindashboard')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ url('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>

                @if(!empty($dashboard) && $dashboard == 'adminpeserta')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ url('admin/peserta') }}"><i class="fa fa-fw fa-users"></i> Peserta</a>
                </li>

                @if(!empty($dashboard) && $dashboard == 'adminjurusan')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ url('admin/jurusan') }}"><i class="fa fa-fw fa-graduation-cap"></i> Jurusan</a>
                </li>
                @if(!empty($dashboard) && $dashboard == 'adminpengumuman')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ url('admin/pengumuman') }}"><i class="fa fa-fw fa-newspaper-o"></i> Pengumuman</a>
                </li>
                @if(!empty($dashboard) && $dashboard == 'adminprosedur')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ url('admin/prosedur') }}"><i class="fa fa-fw fa-book"></i> Prosedur</a>
                </li>
                @if(!empty($dashboard) && $dashboard == 'adminjadwal')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ url('admin/jadwal') }}"><i class="fa fa-fw fa-th-large"></i> Jadwal</a>
                </li>
                @if(!empty($dashboard) && $dashboard == 'adminkontak')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{ url('admin/kontak') }}"><i class="fa fa-fw fa-phone-square"></i> Kontak</a>
                </li>
                @role('admin')
                    @if(!empty($dashboard) && $dashboard == 'adminoperator')
                        <li class="active">
                    @else
                        <li>
                    @endif
                        <a href="{{ url('admin/operator') }}"><i class="fa fa-fw fa-users"></i> Operator</a>
                    </li>
                    @if(!empty($dashboard) && $dashboard == 'adminakunpeserta')
                        <li class="active">
                    @else
                        <li>
                    @endif
                        <a href="{{ url('admin/akunpeserta') }}"><i class="fa fa-fw fa-users"></i> Akun Peserta</a>
                    </li>
                @endrole
                @if(!empty($dashboard) && $dashboard == 'backup')
                    <li class="active">
                @else
                    <li>
                @endif
                        <a href="{{ url('admin/backup') }}"><i class="fa fa-fw fa-gear"></i> Backup</a>
                    </li>
                @if(!empty($dashboard) && $dashboard == 'adminmyadmin')
                    <li class="active">
                @else
                    <li>
                @endif
                        <a href="{{ url('admin/myadmin') }}"><i class="fa fa-fw fa-user"></i> My Admin</a>
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
        var editor_config = {
            path_absolute : "{{ URL::to('/') }}/",
            selector: "textarea.my-editor",
            plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
              var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
              var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

              var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
              if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
              } else {
                cmsURL = cmsURL + "&type=Files";
              }

              tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
              });
            }
          };

          tinymce.init(editor_config);
    </script>
    @yield('scripts')
</body>
</html>

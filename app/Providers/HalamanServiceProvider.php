<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class HalamanServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if(Request::segment(1) == ''){
            $halaman = '/';
        }
        if(Request::segment(1) == 'peserta'){
            $halaman = 'peserta';
        }
        if(Request::segment(1) == 'register'){
            $halaman = 'pendaftaran';
        }
        if(Request::segment(1) == 'pengumuman'){
            $halaman = 'informasi';
        }
        if(Request::segment(1) == 'prosedur'){
            $halaman = 'informasi';
        }
        if(Request::segment(1) == 'jadwal'){
            $halaman = 'informasi';
        }
        if(Request::segment(1) == 'kontak'){
            $halaman = 'bantuan';
        }
        if(Request::segment(1) == 'biodata'){
            $halaman = 'akun';
        }
        if(Request::segment(2) == 'password'){
            $halaman = 'ubahpwd';
        }
        if(Request::segment(2) == ''){
            $halaman = 'admindashboard';
        }
        if(Request::segment(2) == 'peserta'){
            $halaman = 'adminpeserta';
        }
        if(Request::segment(2) == 'jurusan'){
            $halaman = 'adminjurusan';
        }
        if(Request::segment(2) == 'pengumuman'){
            $halaman = 'adminpengumuman';
        }
        if(Request::segment(2) == 'prosedur'){
            $halaman = 'adminprosedur';
        }
        if(Request::segment(2) == 'jadwal'){
            $halaman = 'adminjadwal';
        }
        if(Request::segment(2) == 'kontak'){
            $halaman = 'adminkontak';
        }
        if(Request::segment(2) == 'operator'){
            $halaman = 'adminoperator';
        }
        if(Request::segment(2) == 'akunpeserta'){
            $halaman = 'adminakunpeserta';
        }
        if(Request::segment(2) == 'myadmin'){
            $halaman = 'adminmyadmin';
        }
        view()->share('halaman',$halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

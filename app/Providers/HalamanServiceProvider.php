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
        if(Request::segment(1) == 'home'){
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

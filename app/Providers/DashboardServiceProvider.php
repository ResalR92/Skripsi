<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $dashboard = '';
        if(Request::segment(2) == ''){
            $dashboard = 'admindashboard';
        }
        if(Request::segment(2) == 'peserta'){
            $dashboard = 'adminpeserta';
        }

        if(Request::segment(2) == 'status'){
            $dashboard = 'adminpeserta';
        }

        if(Request::segment(2) == 'jurusan'){
            $dashboard = 'adminjurusan';
        }
        if(Request::segment(2) == 'pengumuman'){
            $dashboard = 'adminpengumuman';
        }
        if(Request::segment(2) == 'prosedur'){
            $dashboard = 'adminprosedur';
        }
        if(Request::segment(2) == 'jadwal'){
            $dashboard = 'adminjadwal';
        }
        if(Request::segment(2) == 'kontak'){
            $dashboard = 'adminkontak';
        }
        if(Request::segment(2) == 'operator'){
            $dashboard = 'adminoperator';
        }
        if(Request::segment(2) == 'akunpeserta'){
            $dashboard = 'adminakunpeserta';
        }
        if(Request::segment(2) == 'myadmin'){
            $dashboard = 'adminmyadmin';
        }
        view()->share('dashboard',$dashboard);
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

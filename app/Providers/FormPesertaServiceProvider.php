<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jurusan;

class FormPesertaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.peserta._form',function($view){
            $view->with('list_jurusan',Jurusan::all()->pluck('nama','id'));
        });
        view()->composer('biodata._form',function($view){
            $view->with('list_jurusan',Jurusan::all()->pluck('nama','id'));
        });
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

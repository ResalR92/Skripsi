<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jurusan;
use App\Status;

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
        view()->composer('admin.peserta.status',function($view){
            $view->with('list_status',Status::all()->pluck('nama','id'));
        });

        view()->composer('admin.backup.index',function($view){
            $view->with('list_jurusan',Jurusan::all()->pluck('nama','id'));
            $view->with('list_status',Status::all()->pluck('nama','id'));
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

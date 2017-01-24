<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Hash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //validasi custom -> passcheck -> ubah password
        Validator::extend('passcheck',function($attribute,$value,$parameters) {
            return Hash::check($value,$parameters[0]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php
//Resal Ramdahadi (resalramdahadi92@gmail.com)
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    //Digunakan oleh BiodataController -> method ->authorize()
    protected $policies = [
        'App\Peserta' => 'App\Policies\PesertaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

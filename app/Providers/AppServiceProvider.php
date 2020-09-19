<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
 
 
        //Creación de plantilla blade para control de acceso de administradores
        \Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
 
    }

     
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
     
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        //Creación de plantilla blade para control de acceso de administradores
        \Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
=======
        //
>>>>>>> 23bcdca... Actualizado a 7
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
<<<<<<< HEAD
    public function register()
    {
        //
    }
=======

public function boot()
{
    Schema::defaultStringLength(191);
}
>>>>>>> 23bcdca... Actualizado a 7
}

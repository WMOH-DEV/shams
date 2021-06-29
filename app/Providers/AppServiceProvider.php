<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
             Blade::if('Mod', function (){
            $user = Auth::user();
            return auth()->user() && $user->role_id == 4;
        });

        Blade::if('superAdmin', function (){
            $user = Auth::user();
            return auth()->user() && $user->role_id == 3;
        });
    }
}

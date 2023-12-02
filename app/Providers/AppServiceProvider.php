<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($q){
            logger($q->sql);
        });

        Blade::if("admin",function (){
            return Auth::user()->role === "admin";
        });
        Blade::if("trash",function (){
            return request()->trash == 1;
        });
        Blade::if("not_trash",function (){
            return request()->trash == 0;
        });
    }
}

<?php

namespace App\Providers;

use App\Http\View\Composers\MenuComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\CartComposer;


class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('header', MenuComposer::class);
        View::composer('cart', CartComposer::class);
    }
}
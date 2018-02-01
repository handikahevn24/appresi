<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Resi;
use App\Toko;

class FormSiswaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('resi.form', function($view) {
        $view->with('list_toko', Toko::lists('nama_toko', 'id'));
        });

        view()->composer('resi.form_pencarian', function($view) {
        $view->with('list_toko', Toko::lists('nama_toko', 'id'));
        });

        view()->composer('ongkir.form_pencarian_ongkir', function($view) {
            $view->with('list_toko', Toko::lists('nama_toko', 'id'));
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

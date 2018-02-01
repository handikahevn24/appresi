<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class LaravelAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $halaman = '';
        if (Request::segment(1)== 'resi'){
            $halaman = 'resi';
        }
        if (Request::segment(1)== 'ongkir'){
            $halaman = 'ongkir';
        }
        if (Request::segment(1)== 'importexport'){
            $halaman = 'importexport';
        }
        if (Request::segment(1)== 'laporan'){
            $halaman = 'laporan';
        }
        view()->share('halaman', $halaman);
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

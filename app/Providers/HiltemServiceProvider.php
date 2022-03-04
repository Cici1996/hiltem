<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HiltemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       require_once app_path() . '/Helpers/Exportpdf.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

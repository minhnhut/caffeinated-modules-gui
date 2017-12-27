<?php

namespace MinhNhut\CaffeinatedModulesGui;

use Illuminate\Support\ServiceProvider;

class ModulesGuiProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!class_exists('Caffeinated\\Modules\\Modules')) {
            throw new \Exception("CaffeinatedModulesGui: Caffeinated\\Modules is not installed. Please check and install this package in order to use CaffeinatedModulesGui package.");
        }
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'caffeintaed-modules-gui');
        
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/caffeintaed-modules-gui'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}

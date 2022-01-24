<?php

namespace Georgie\laravelFeiePrinter;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //配置文件
        echo '123';
        $configPath = __DIR__ . '/dis/feie_printer.php';
        $this->publishes([
            $configPath => config_path('feiE.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}

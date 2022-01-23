<?php

namespace Georgie\laravelFeiePrinter;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //配置文件
        echo '123';
        $url = __DIR__.'/dis/feie_printer.php';
        $url2 = config_path('feiE.php');
        $content = file_get_contents($url);
        is_dir($url2) or mkdir($url2);
        file_put_contents($url2,$content);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravelFeiePrinter', function () {
            return new Provider();
        });
    }
}

<?php

namespace Zenapply\Pipe;

use Illuminate\Support\ServiceProvider;

class PipeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/pipe.php', 'pipe');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/pipe.php' => base_path('config/pipe.php'),
        ]);
    }
}

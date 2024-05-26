<?php

namespace App\Providers;

use App\Facades\Kinopoisk\Kinopoisk;
use Illuminate\Support\ServiceProvider;

class KinopoiskServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('Kinopoisk', function () {
            return new Kinopoisk();
        });
    }

    public function boot(): void
    {
    }
}

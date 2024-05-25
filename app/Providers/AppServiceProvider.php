<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Blade::component(\App\View\Components\Layouts\Main::class, 'main-layout');

        Blade::component(\App\View\Components\Headers\Main::class, 'main-header');

        Blade::component(\App\View\Components\Footers\Main::class, 'main-footer');
    }
}

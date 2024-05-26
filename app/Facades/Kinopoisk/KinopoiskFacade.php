<?php

namespace App\Facades\Kinopoisk;

use Illuminate\Support\Facades\Facade;

class KinopoiskFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return 'Kinopoisk';
    }

}

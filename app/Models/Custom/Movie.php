<?php

namespace App\Models\Custom;

use App\Abstracts\AbstractKinopoisk;

class Movie extends AbstractKinopoisk
{
    protected string $type = 'movie';
}
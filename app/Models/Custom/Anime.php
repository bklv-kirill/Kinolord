<?php

namespace App\Models\Custom;

use App\Abstracts\AbstractKinopoisk;

class Anime extends AbstractKinopoisk
{
    protected string $type = 'anime';
}
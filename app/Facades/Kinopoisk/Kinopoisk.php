<?php

namespace App\Facades\Kinopoisk;

use App\Abstracts\AbstractKinopoisk;

class Kinopoisk extends AbstractKinopoisk
{
    public function movies(): array
    {
        return $this->getEntityData('movie');
    }
    public function series(): array
    {
        return $this->getEntityData('tv-series');
    }

    public function anime(): array
    {
        return $this->getEntityData('anime');
    }
}

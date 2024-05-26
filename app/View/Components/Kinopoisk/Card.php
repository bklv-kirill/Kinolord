<?php

namespace App\View\Components\Kinopoisk;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public array $kpData,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.kinopoisk.card');
    }
}

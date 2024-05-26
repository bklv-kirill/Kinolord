<?php

namespace App\View\Components\Kinopoisk;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptySearch extends Component
{
    public function __construct()
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.kinopoisk.empty-search');
    }
}

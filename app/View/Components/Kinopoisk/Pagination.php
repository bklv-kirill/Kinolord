<?php

namespace App\View\Components\Kinopoisk;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    public function __construct(
        public int $page,
        public int $pages,
        public string $route,
        public array $queryParams,
    )
    {
        $this->page = $this->page > $this->pages ? 1 : $this->page;
        $this->pages = $this->page > $this->pages ? 1 : $this->pages;
    }

    public function render(): View|Closure|string
    {
        return view('components.kinopoisk.pagination');
    }
}

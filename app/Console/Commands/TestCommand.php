<?php

namespace App\Console\Commands;

use App\Models\Custom\Movie;
use App\Models\Genre;
use Illuminate\Console\Command;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class TestCommand extends Command
{
    protected $signature = 'test:run';

    protected $description = 'Command for running tests';

    public function handle()
    {
        $movies = Movie::query()->get();
        $paginator = new LengthAwarePaginator($movies, $movies['total'], 10);
        dd($paginator->links());
        dd('test');
    }
}
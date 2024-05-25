<?php

namespace App\Console\Commands;

use App\Classes\Kinopoisk\KinopoiskMovie;
use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature = 'test:run';

    protected $description = 'Command for running tests';

    public function handle()
    {
        $queryParams = [
            'id' => 666,
        ];

        $kinopoiskMovie = new KinopoiskMovie();
        $movie = $kinopoiskMovie->movie($queryParams);

        dd($movie);

        dd('test');
    }
}

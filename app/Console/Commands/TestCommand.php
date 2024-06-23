<?php

namespace App\Console\Commands;

use App\Models\Genre;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'test:run';

    protected $description = 'Command for running tests';

    public function handle()
    {
        Genre::query()->get()->each(function (Genre $genre) {
            $genre->update([
                'name' => str($genre->name)->ucfirst(),
            ]);
        });

        dd('test');
    }
}
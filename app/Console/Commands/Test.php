<?php

namespace App\Console\Commands;

use App\Models\Sort;
use Illuminate\Console\Command;

class Test extends Command
{

    protected $signature = 'test:run';

    protected $description = 'Command for running tests';

    public function handle()
    {
        dd('test');
    }

}

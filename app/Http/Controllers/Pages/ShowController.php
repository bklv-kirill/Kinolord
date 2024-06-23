<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Custom\Movie;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request, int $movieId)
    {
        $movie = Movie::query()->find($movieId);
        dd($movie);
    }
}
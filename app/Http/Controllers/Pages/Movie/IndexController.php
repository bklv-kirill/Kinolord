<?php

namespace App\Http\Controllers\Pages\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use App\Services\Kinopoisk\KinopoiskMovieService;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(KinopoiskRequest $request, KinopoiskMovieService $kinopoiskMovieService): View
    {
        $movieQueryParams = $request->validated();

        $movies = $kinopoiskMovieService->getContent($movieQueryParams);

        return view('pages.movie.index', compact(['movies']));
    }
}

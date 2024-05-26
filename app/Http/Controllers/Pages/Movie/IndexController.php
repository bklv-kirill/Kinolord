<?php

namespace App\Http\Controllers\Pages\Movie;

use App\Facades\Kinopoisk\KinopoiskFacade as Kinopoisk;
use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\View\View;

class IndexController extends Controller
{

    public function __invoke(KinopoiskRequest $request): View
    {
        $requestData = $request->validated();

        $movies = Kinopoisk::query($requestData)->movies();

        $countries = Country::query()->get();
        $genres = Genre::query()->get();

        unset($requestData['page']);

        return view('pages.movie.index', compact(['movies', 'countries', 'genres', 'requestData']));
    }

}

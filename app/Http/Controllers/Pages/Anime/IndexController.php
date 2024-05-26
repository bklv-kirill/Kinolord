<?php

namespace App\Http\Controllers\Pages\Anime;

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

        $anime = Kinopoisk::query($requestData)->anime();

        $genres = [];
        if (isset($requestData['genres'])) {
            $genres = Genre::query()->whereIn('id', $requestData['genres'])
                ->get();
        }

        $countries = [];
        if (isset($requestData['countries'])) {
            $countries = Country::query()->whereIn('id', $requestData['countries'])
                ->get();
        }

        unset($requestData['page']);

        return view('pages.anime.index',
            compact(['anime', 'genres', 'countries', 'requestData']));
    }

}

<?php

namespace App\Http\Controllers\Pages\Anime;

use App\Actions\Kinopoisk\GetFilterDataAction;
use App\Facades\Kinopoisk\KinopoiskFacade as Kinopoisk;
use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use Illuminate\View\View;

class IndexController extends Controller
{

    public function __invoke(KinopoiskRequest $request): View
    {
        $requestData = $request->validated();

        $anime = Kinopoisk::query($requestData)->anime();

        $filterData = (new GetFilterDataAction())($requestData);

        unset($requestData['page']);

        return view('pages.anime.index',
            compact(['anime', 'filterData', 'requestData']));
    }

}

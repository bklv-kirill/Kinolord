<?php

namespace App\Http\Controllers\Pages\Series;

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

        $series = Kinopoisk::query($requestData)->series();

        $filterData = (new GetFilterDataAction())($requestData);

        unset($requestData['page']);

        return view('pages.series.index',
            compact(['series', 'filterData', 'requestData']));
    }

}

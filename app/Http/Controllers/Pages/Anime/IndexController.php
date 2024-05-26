<?php

namespace App\Http\Controllers\Pages\Anime;

use App\Http\Controllers\Controller;
use App\Http\Requests\KinopoiskRequest;
use App\Services\Kinopoisk\KinopoiskAnimeService;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(KinopoiskRequest $request, KinopoiskAnimeService $kinopoiskAnimeService): View
    {
        $animeQueryParams = $request->validated();

        $anime = $kinopoiskAnimeService->getContent($animeQueryParams);

        return view('pages.anime.index', compact(['anime']));
    }
}

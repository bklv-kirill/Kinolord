<?php

use App\Http\Controllers\Pages\MainPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPageController::class)->name('main');

Route::name('movie.')->group(function () {
    Route::get('/movies', \App\Http\Controllers\Pages\Movie\IndexController::class)->name('index');
});
Route::name('series.')->group(function () {
    Route::get('/series', \App\Http\Controllers\Pages\Series\IndexController::class)->name('index');
});
Route::name('anime.')->group(function () {
    Route::get('/anime', \App\Http\Controllers\Pages\Anime\IndexController::class)->name('index');
});

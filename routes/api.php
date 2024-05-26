<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('countries.')->group(function () {
    Route::get('/countries', \App\Http\Controllers\Api\Country\IndexController::class)->name('index');
});

Route::name('genres.')->group(function () {
    Route::get('/genres', \App\Http\Controllers\Api\Genre\IndexController::class)->name('index');
});

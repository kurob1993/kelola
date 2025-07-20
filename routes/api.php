<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/callback', function (Request $request) {
    Log::debug("Header callback");
    Log::debug(json_encode($request->header()));

    Log::debug("Body callback");
    Log::debug(json_encode($request->all()));
});

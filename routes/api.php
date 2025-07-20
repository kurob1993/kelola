<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/callback', function (Request $request) {
   \Illuminate\Support\Facades\Log::debug(json_encode($request->all()));
});

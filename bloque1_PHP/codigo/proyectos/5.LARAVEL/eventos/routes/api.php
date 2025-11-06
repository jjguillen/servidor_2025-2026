<?php

use App\Http\Controllers\EventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/eventos', [EventoController::class, 'api_index']);
Route::get('/eventos/{evento}', [EventoController::class, 'api_show']);


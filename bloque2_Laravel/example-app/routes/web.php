<?php

use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Pintar todas las incidencias
//Route::get('/incidencias', IncidenciaController::class . '@index');
Route::get('/incidencias', [IncidenciaController::class, 'index'])->name('incidencias.index');
Route::get('/incidencias/delete/{id}', [IncidenciaController::class, 'delete'])->name('incidencias.delete');


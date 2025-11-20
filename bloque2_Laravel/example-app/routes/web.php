<?php

use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Rutas para Incidencias
Route::prefix('incidencias')->group(function () {
    Route::get('', [IncidenciaController::class, 'index'])->name('incidencias.index');
    Route::get('/delete/{id}', [IncidenciaController::class, 'delete'])->name('incidencias.delete');
    Route::post('/store', [IncidenciaController::class, 'store'])->name('incidencias.store');
    Route::get('/show/{id}', [IncidenciaController::class, 'show'])->name('incidencias.show');
});


//Rutas para Tecnicos
Route::resource('tecnicos', TecnicoController::class)->names('tecnicos');



<?php

use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('incidencias')->group(function () {
    Route::get('', [IncidenciaController::class, 'index'])->name('incidencias.index');
    Route::get('/delete/{id}', [IncidenciaController::class, 'delete'])->name('incidencias.delete');
    Route::post('/store', [IncidenciaController::class, 'store'])->name('incidencias.store');
    Route::get('/show/{id}', [IncidenciaController::class, 'show'])->name('incidencias.show');
});




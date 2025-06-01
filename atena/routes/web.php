<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\EstadisticasController;

Route::resource('alumnos', AlumnoController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('profesores', ProfesorController::class);
Route::resource('convenios', ConvenioController::class);
Route::resource('ofertas', OfertaController::class);
Route::get('convenios/{convenio}/pdf', [ConvenioController::class, 'pdf'])
     ->name('convenios.pdf');

Route::post('/convenios/{convenio}/cerrar', [ConvenioController::class, 'cerrar'])
    ->name('convenios.cerrar');

Route::post('ofertas/{oferta}/apuntarse', [OfertaController::class, 'apuntarse'])
    ->name('ofertas.apuntarse');

Route::post('ofertas/{oferta}/desinscribirse', [OfertaController::class, 'desinscribirse'])
    ->name('ofertas.desinscribirse');

Route::post('ofertas/{oferta}/alumno/{alumno}/observaciones', [OfertaController::class, 'guardarObservaciones'])
    ->name('ofertas.observaciones');

Route::get('/estadisticas', [EstadisticasController::class, 'index'])
    ->name('estadisticas');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

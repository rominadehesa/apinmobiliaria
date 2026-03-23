<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\PublicController;

/*Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/', [PublicController::class, 'index']);
Route::get('/inicio', [PublicController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/propiedades', [PropiedadController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.propiedades');
Route::get('/dashboard/tipos', [PropiedadController::class, 'showTypes'])->middleware(['auth', 'verified'])->name('dashboard.tipos');
Route::post('/dashboard/tipos/save', [PropiedadController::class, 'saveType'])->middleware(['auth', 'verified'])->name('dashboard.tipos.save');
Route::put('/dashboard/tipos/{id}', [PropiedadController::class, 'updateType'])->name('dashboard.tipos.update');
Route::delete('/dashboard/tipos/{id}', [PropiedadController::class, 'destroyType'])->name('dashboard.tipos.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

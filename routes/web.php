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
Route::get('/propiedades', [PublicController::class, 'allPropiedades'])->name('propiedades');
Route::get('/propiedades/{id}', [PublicController::class, 'showPropiedad'])->name('propiedades.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/propiedades', [PropiedadController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.propiedades');

Route::get('/dashboard/propiedades/create', [PropiedadController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.propiedades.create');
Route::post('/dashboard/propiedades', [PropiedadController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.propiedades.store');
Route::get('/dashboard/propiedades/{id}/edit', [PropiedadController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.propiedades.edit');
Route::put('/dashboard/propiedades/{id}', [PropiedadController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.propiedades.update');
Route::delete('/dashboard/propiedades/{id}', [PropiedadController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.propiedades.destroy');

Route::get('/dashboard/propiedades/{id}/imagenes/create', [PropiedadController::class, 'createImage'])->middleware(['auth', 'verified'])->name('dashboard.propiedades.imagenes.create');
Route::post('/dashboard/propiedades/{propiedad}/imagenes/store', [PropiedadController::class, 'storeImage'])->name('dashboard.propiedades.imagenes.store');
Route::delete('/dashboard/imagenes/{imagen}', [PropiedadController::class, 'destroyImage'])->name('dashboard.imagenes.destroy');

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

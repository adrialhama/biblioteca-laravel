<?php

use App\Http\Controllers\LibrosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BuscadorLibros;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LibrosController::class, 'index'])->name('index');

Route::get('/libro', BuscadorLibros::class)->name('libro.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('libro', LibrosController::class)->middleware(['auth', 'verified']); // Esto es para que el usuario este identificado por su email
Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
Route::resource('prestamo', PrestamosController::class)->middleware(['auth', 'verified']);

/**
 * Solo el usuario con rol de bibliotecario tendrá acceso a las rutas de edit, create y update.
 * Las rutas index y store serán visibles para el resto de usuarios
 */
Route::middleware(['auth', 'role:bibliotecario'])->group(function () {
    Route::resource('libro', 'LibroController')->except(['index', 'show']);
    Route::post('libro/{id}', 'LibroController@update')->name('libro.update');
    Route::get('/libro/create', [LibroController::class, 'create'])->name('libro.create');
    Route::get('/libro/{id}/edit', [LibroController::class, 'edit'])->name('libro.edit');
    Route::put('/libro/{id}', [LibroController::class, 'update'])->name('libro.update');
});


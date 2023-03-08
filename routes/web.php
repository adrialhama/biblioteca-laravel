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


Route::resource('libro', LibrosController::class)->middleware(['auth.basic']); // Esto es para autorizar las modificaciones de la BD que por defecto en el
                                                                                // authorize() del ApiLibrosRequest viene a False


/**
 * Solo el usuario con rol de bibliotecario tendrá acceso a las rutas de edit, create y update.
 * Las rutas index y store serán visibles para el resto de usuarios
 */

Route::middleware(['auth', 'role:bibliotecario'])->group(function () {
    Route::resource('libro', LibrosController::class)->except(['index', 'show']);
    Route::get('/libro/create', [LibrosController::class, 'create'])->name('libro.create');
    Route::get('/libro/{libro}/edit', [LibrosController::class, 'edit'])->name('libro.edit');
    Route::put('/libro/{libro}', [LibrosController::class, 'update'])->name('libro.update');
    //Route::get('/prestamo/{prestamo}', [PrestamosController::class, 'show'])->name('prestamo.show');

});

Route::get('/prestamo/{prestamo}', [PrestamosController::class, 'show'])->name('prestamo.show');




/**
 * Las rutas de index, create, edit y update del UserController solo serán accesibles por usuarios con el rol de "admin"
 */
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
});





<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[LibrosController::class, 'get10'], function () {
    return view('dashboard');
})->name('inicio');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('libros', LibrosController::class)->middleware(isAdmin::class)->except('index','show');
Route::get('/libros', [LibrosController::class, 'index'],function () { return view('libros/index');})->name('libros.index');
Route::resource('comentarios', ComentariosController::class)->middleware(isAdmin::class)->except('index');
Route::get('/misFavoritos', [FavoritosController::class, 'index'],function () { return view('favoritos/index');})->middleware('auth')->name('favoritos.index');
Route::get('/libros/{libro}', [LibrosController::class, 'show'],function () { return view('libros/{libro}');})->name('libros.show');


Route::get('download-pdf',[LibrosController::class,'downloadPDF'])->name('download');


require __DIR__.'/auth.php';

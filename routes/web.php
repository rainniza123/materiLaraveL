<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController ;
use App\Http\Controllers\PeranController ;
use App\Http\Controllers\KritikController ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan diberikan
| ke grup middleware "web". Buatlah sesuatu yang hebat!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::get('/registration', 'register')->name('auth.register');
    Route::post('/simpan', 'store')->name('auth.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/otentikasi', 'authentication')->name('auth.authentication');
    Route::get('/dasbor', 'dashboard')->name('auth.dashboard');
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::resource('/cast', CastController::class)->middleware('auth');
Route::resource('/genre', GenreController::class)->middleware('auth');
Route::resource('/film', FilmController ::class)->middleware('auth');

Route::get('/film/{id}/peran/create', [PeranController::class, 'create'])->name('peran.create');
Route::post('/film/{id}/peran/', [PeranController::class, 'store']) ->name('peran.store');

Route::get('/film/{id}/kritik/create', [KritikController::class,'create'])->name('kritik.create');
Route::post('/film/{id}/kritik', [KritikController::class, 'store'])->name('kritik.store');
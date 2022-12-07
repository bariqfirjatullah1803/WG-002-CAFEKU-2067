<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::middleware(['owner'])->group(function () {
        Route::resource('user', UserController::class);
    });
    Route::resource('kategori', KategoriController::class);
    Route::resource('menu', MenuController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('pesan', [BerandaController::class, 'pesan'])->name('pesan');
});
Route::get('/', [BerandaController::class, 'index'])->name('index');

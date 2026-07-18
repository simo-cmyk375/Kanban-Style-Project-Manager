<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::middleware('guest')->group(function(){
    Route::view('/register','auth.register')->name('register.page');
    Route::view('/login', 'auth.login')->name('login.page');
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    // Ajout de ->name() à la fin de chaque route
    Route::get('/boards', [BoardController::class, 'index'])->name('boards.index');
    Route::get('/boards/create', [BoardController::class, 'create'])->name('boards.create');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');

    Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');
    Route::get('/boards/{board}/edit', [BoardController::class, 'edit'])->name('boards.edit');
    Route::put('/boards/{board}', [BoardController::class, 'update'])->name('boards.update');
    Route::delete('/boards/{board}', [BoardController::class, 'destroy'])->name('boards.destroy');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WatchController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/', [WatchController::class, 'index']);
Route::get('/watches', [WatchController::class, 'index'])->name('watches.index');
Route::get('/watches/create', [WatchController::class, 'create'])->name('watches.create');
Route::post('/watches', [WatchController::class, 'store'])->name('watches.store');
Route::get('/watches/{id}/edit', [WatchController::class, 'edit'])->name('watches.edit');
Route::put('/watches/{id}', [WatchController::class, 'update'])->name('watches.update');
Route::delete('/watches/{id}', [WatchController::class, 'destroy'])->name('watches.destroy');
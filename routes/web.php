<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'] )->name('home')->middleware('guest');

Route::get('/dashboard', [HomeController::class, 'dashboard'] )->name('dashboard')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'] )->name('login.post')->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'] )->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'] )->name('register.post')->middleware('guest');

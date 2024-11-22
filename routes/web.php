<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'] )->name('home')->middleware('guest');

Route::get('/dashboard', [HomeController::class, 'dashboard'] )->name('dashboard')->middleware('auth');

Route::get('/login', [HomeController::class, 'login'] )->name('login')->middleware('guest');

Route::get('/register', [HomeController::class, 'register'] )->name('register')->middleware('guest');

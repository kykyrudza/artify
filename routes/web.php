<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    // home page
    Route::get('/', [HomeController::class, 'index'] )->name('home');

    // login routs
    Route::get('/login', [LoginController::class, 'index'] )->name('login');
    Route::post('/login', [LoginController::class, 'store'] )->name('login.post');

    // register routs
    Route::get('/register', [RegisterController::class, 'index'] )->name('register');
    Route::post('/register', [RegisterController::class, 'store'] )->name('register.post');
});

Route::group(['middleware' => 'auth'], function () {
    // dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'] )->name('dashboard');

    // tasks routs
    Route::get('/dashboard/create/task', [TaskController::class, 'create'] )->name('task.create');
    Route::post('/dashboard/create/task', [TaskController::class, 'store'] )->name('task.store');
});

Route::get('/test-login', function () {
    $user = User::find(1);
    Auth::login($user);

    return redirect('/dashboard');
});

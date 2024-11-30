<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
    Route::prefix('dashboard')->group(function () {
        // dashboard
        Route::get('/', [HomeController::class, 'dashboard'] )->name('dashboard');

        // tasks routs
        Route::get('/create/task', [TaskController::class, 'create'] )->name('task.create');
        Route::post('/create/task', [TaskController::class, 'store'] )->name('task.store');
        Route::get('/complete/tasks', [TaskController::class, 'complete'] )->name('task.complete');
        Route::post('/complete/tasks/{id}', [TaskController::class, 'completed'] )->name('task.completed');
        Route::post('/delete/task/{id}', [TaskController::class, 'delete'] )->name('task.delete');

        // user routs
        Route::get('/user/{name}/profile', [UserController::class, 'profile'] )->name('user.profile');
        Route::post('/user/update', [UserController::class, 'update'])->name('user.update');

    });
});

Route::get('/test-login', function () {
    $user = User::find(1);
    Auth::login($user);

    return redirect('/dashboard');
});

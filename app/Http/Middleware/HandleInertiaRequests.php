<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
   protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }
    public function share(Request $request): array
    {
        $routsWithoutHeader = [
            'home',
            'login',
            'register',
        ];

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => Auth::check() ? Auth::user()->only('id', 'name', 'email') : null,
            ],
            'showHeader' => !in_array(Route::currentRouteName(), $routsWithoutHeader),
        ]);
    }
}

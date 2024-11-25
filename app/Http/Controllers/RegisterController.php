<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;
use App\Actions\RegisterUserAction;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterRequest $request, RegisterUserAction $registerUserAction)
    {
        $registerUserAction->register($request);

        return Redirect::route('dashboard');
    }
}

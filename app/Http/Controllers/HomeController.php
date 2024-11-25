<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Home');
    }

    public function dashboard()
    {
        $user = auth()->user();

        return Inertia::render('Home/Dashboard', [
            'user' => $user
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\UpdateUserAction;
use App\Http\Requests\UpdateUserRequest;
use Inertia\Inertia;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        return Inertia::render('User/Profile', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUserAction $updateUserAction, UpdateUserRequest $request)
    {
        $updateUserAction->update($request);

        $user = auth()->user();

        return redirect()->route('dashboard');
    }
}

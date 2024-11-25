<?php

namespace App\Actions;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserAction
{
    public function register(RegisterRequest $request): void
    {

        $data = $request->validated();

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
        ]);

        Auth::login($user);

    }
}

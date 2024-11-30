<?php

namespace App\Actions;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();

        $user = User::findOrFail($request->id);

        $user->update(array_filter([
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'password' => isset($data['password']) ? Hash::make($data['password']) : null,
        ]));
    }
}

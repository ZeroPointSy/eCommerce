<?php

namespace App\Services;

use App\Data\UserData;
use App\Models\User;

class UserService
{
    public function getByCredentials(UserData $userData)
    {
        if (auth()->attempt($userData->only('username', 'password')->toArray())) {
            return auth()->user();
        }
        return null;
    }
    public function store(UserData $userData)
    {
        return User::create($userData->toArray());
    }

    public function revokeCurrentToken(User $user)
    {
        $user->token()->revoke();
    }

    public function update(User $user, UserData $userData)
    {
        return $user->update($userData->toArray());
    }

    public function grantAuthToken(User $user)
    {
        $user['accessToken'] = $user->createToken('Api Token', [$user->role->name])->accessToken;
        return $user;
    }
}

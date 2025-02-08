<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomUserProvider extends EloquentUserProvider
{
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plainPassword = $credentials['password'];

        // If passwords are stored in plain text
        return $plainPassword === $user->getAuthPassword();

        // If passwords are hashed differently, adjust the logic accordingly
        // Example for MD5:
        // return md5($plainPassword) === $user->getAuthPassword();
    }
}

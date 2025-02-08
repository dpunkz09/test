<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class UserPassUserProvider extends EloquentUserProvider
{
    /**
     * Create a new database user provider.
     */
    public function __construct(HasherContract $hasher, $model)
    {
        parent::__construct($hasher, $model);
    }

    /**
     * Validate a user against the given credentials.
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password']; // Use 'password' matching form input name

        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}

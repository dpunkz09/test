<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Illuminate\Support\Str;

class ResetUserPassword implements ResetsUserPasswords
{
    /**
     * Reset the user's password.
     *
     * @param  \App\Models\User  $user
     * @param  array  $input
     * @return void
     */
    public function reset($user, array $input)
    {
        $user->forceFill([
            'UserPass' => $input['password'],              // Plaintext (not recommended)
            'UserPass2' => $input['password'],             // Plaintext (not recommended)
            'Upass' => Hash::make($input['password']),     // Hashed password
            'remember_token' => Str::random(60),
        ])->save();
    }
}

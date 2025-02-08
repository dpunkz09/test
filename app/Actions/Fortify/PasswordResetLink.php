<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;

class PasswordResetLink
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'UserEmail' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            ['UserEmail' => $request->UserEmail]
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withErrors(['UserEmail' => __($status)]);
    }
}

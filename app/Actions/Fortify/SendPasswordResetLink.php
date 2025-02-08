<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Lang;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;

class SendPasswordResetLink
{
    /**
     * Send a password reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'UserEmail' => 'required|email',
        ]);

        // Use the 'UserEmail' field to send the reset link
        $status = Password::sendResetLink(
            ['UserEmail' => $request->UserEmail]
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withErrors(['UserEmail' => __($status)]);
    }
}

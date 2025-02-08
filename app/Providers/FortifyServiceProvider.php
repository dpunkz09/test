<?php

namespace App\Providers;

use App\Actions\Fortify\SendPasswordResetLink;
use App\Actions\Fortify\ResetUserPassword;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Use the custom action to send password reset links
        Fortify::requestPasswordResetLinkUsing(SendPasswordResetLink::class);

        // Reset User Passwords
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Other customizations...
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Fortify::resetPasswordView(function () {
            return view('auth.reset-password');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });
    }
}

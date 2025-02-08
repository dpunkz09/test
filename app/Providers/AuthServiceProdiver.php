<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Providers\UserPassUserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class AuthUserPassServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any authentication services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('userpass', function ($app, array $config) {
            return new UserPassUserProvider(
                $app['hash'], // Correctly retrieve the hasher
                $config['model']
            );
        });
    }
}

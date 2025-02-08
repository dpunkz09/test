<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\UserPassUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register any other services if needed
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('userpass', function ($app, array $config) {
            return new UserPassUserProvider(
                $app->make(HasherContract::class),
                $config['model']
            );
        });
    }
}

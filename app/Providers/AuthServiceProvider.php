<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes([
            'authorize' => true,
            'token' => true,
            'revoker' => true,
        ]);

        Passport::tokenExpireIn(now()->addDays(7));
        Passport::refreshTokenExpireIn(now()->addDays(30));
    }
}

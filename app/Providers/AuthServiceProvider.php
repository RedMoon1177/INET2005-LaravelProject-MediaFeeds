<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {

            $loggedInUser = Auth::user();

            $userRoles = $loggedInUser->roles;

            if ($userRoles->isEmpty()) {
                return false;
            }

            foreach ($userRoles as $role) {
                if ($role->id == 1) {
                    return true;
                }
            }

            return false;
        });

        Gate::define('isMod', function ($user) {

            $loggedInUser = Auth::user();

            $userRoles = $loggedInUser->roles;

            if ($userRoles->isEmpty()) {
                return false;
            }

            foreach ($userRoles as $role) {
                if ($role->id == 2) {
                    return true;
                }
            }

            return false;
        });
    }
}

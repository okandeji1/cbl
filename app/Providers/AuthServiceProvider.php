<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Passport::routes();

        Gate::define('isSuperAdmin', function ($user) {
            return $user->role_id === 1
                    ? Response::allow()
                    : Response::deny('You must be a super administrator.');
        });

        Gate::define('isAdmin', function ($user) {
            return $user->role_id === 2 || $user->role_id === 3 || $user->role_id === 4 || $user->role_id === 8;
        });

        Gate::define('isLabAdmin', function ($user) {
            return $user->role_id === 4
            ? Response::allow()
            : Response::deny('You must be a lab administrator.');
        });

        Gate::define('isSuperOrLabAdmin', function ($user) {
            return $user->role_id === 1 || $user->role_id === 4
            ? Response::allow()
            : Response::deny('You must be a super or lab administrator.');
        });
        // Supervisor
        Gate::define('isSupervisor', function ($user) {
            return $user->role_id === 5
            ? Response::allow()
            : Response::deny('You must be a supervisor.');
        });
        Gate::define('isProfiler', function ($user) {
            return $user->role_id === 6
            ? Response::allow()
            : Response::deny('You must be a profiler.');
        });
        Gate::define('isEkoCare', function ($user) {
            return $user->role_id === 7
            ? Response::allow()
            : Response::deny('You must be an Eko Care.');
        });
        Gate::define('isLGA', function ($user) {
            return $user->role_id === 8
            ? Response::allow()
            : Response::deny('You must be a LGA.');
        });
    }
}

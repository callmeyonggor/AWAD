<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\InvoicePolicy;
use App\Invoice;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Invoice::class => InvoicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*define an administrator user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        /*define an employee user role */
        Gate::define('isEmployee', function($user) {
            return $user->role == 'employee';
        });

        /*define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });
    }
}
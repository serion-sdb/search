<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Doesn't know the authenticated user yet
        //dd(\Auth::user());
        //dd(request()->user());

        // Called when Gate::allows or Gate::denies is called
        Gate::before(function ($user, $ability) {
            dd(auth()->user());
            //dd($user);
            return $user->hasRole('Admin') ? true : null;
        });

        Gate::define('access-home', function ($user) {
            return $user->id === \Auth::user()->id;
        });
        
    }
}

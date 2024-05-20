<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user,$ability) {
            // if($user->id == 1) {
            //     return true;
            // }
        });


        foreach (\App\Models\ability::get() as $data) {
          
            Gate::define($data->ability_name, function ($user) use ($data) {
                foreach ($user->rolesRelation as $role) {
                    if (in_array(($data->ability_name), $role->abilities)) {
                        return true;
                    }
                }
                return false;
            });
        }
    }
}

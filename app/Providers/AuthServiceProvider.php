<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('posts.destroy', function($admin){
            if($admin->isAdmin()){
                return true;
            }
            return false;
        });
        Gate::define('tags.destroy', function($admin){
            if($admin->isAdmin()){
                return true;
            }
            return false;
        });
        Gate::define('categories.destroy', function($admin){
            if($admin->isAdmin()){
                return true;
            }
            return false;
        });
        Gate::define('users.manage', function($admin){
            if($admin->isAdmin()){
                return true;
            }
            return false;
        });
        Gate::define('users.create', function($admin){
            if($admin->isAdmin()){
                return true;
            }
            return false;
        });
        Gate::define('users.edit', function($admin){
            if($admin->isAdmin()){
                return true;
            }
            return false;
        });
        Gate::define('users.destoy', function($admin){
            if($admin->isAdmin()){
                return true;
            }
            return false;
        });
    }
}

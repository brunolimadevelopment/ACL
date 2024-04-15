<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $permisssions = Permission::with('roles')->get(); // pega todas as permissions
        //dd($permisssions);

        foreach($permisssions as $permisssion) {

            Gate::define($permisssion->name, function ($user) use ($permisssion) {
                return $user->hasPermission($permisssion);
            });

        }

        //dd(Gate::abilities());

    }
}

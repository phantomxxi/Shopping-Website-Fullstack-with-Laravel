<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        $this->defineGateCategory();

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });
        Gate::define('product-edit', function ($user, $id) {
            $product = Product::find($id);
            if ($user->checkPermissionAccess(config('permissions.access.edit-product')) && $user->id === $product->user_id){
                return true;
            }
            return false;
        });



        Gate::define('product-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-product'));
        });

    }

    public function defineGateCategory()
    {
        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    }
}

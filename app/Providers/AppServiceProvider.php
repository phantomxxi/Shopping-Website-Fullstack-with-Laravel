<?php

namespace App\Providers;

use App\Category;
use App\Components\Recusive;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $recusive = new Recusive(Category::all());
        $htmlOption = $recusive->categoryRecusive($parentId = '');
        View::share('htmlOption', $htmlOption);
        Schema::defaultStringLength(191);
    }
}

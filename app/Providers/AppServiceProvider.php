<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Http\Controllers\HomeController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts/partions/menu-top',function($view){
            $categories = Category::all();
            // if (SESSION('cart')) {
            //     $oldCart = SESSION::get('cart');
            // }
            $view->with(['categories' => $categories]);
        });
    }
}

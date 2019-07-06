<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;

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
            $view->with([
                'categories' => $categories,
            ]);
        });

        // view()->composer('layouts/partions/header',function($view){
        //     if(Session('cart')){
        //         $oldcart = session()->get('cart');
        //         $product = new Cart($oldcart);
        //     }
        //     $view->with([
        //         'cart' => session()->get('cart'), 
        //     ]);
        // });
    }
}

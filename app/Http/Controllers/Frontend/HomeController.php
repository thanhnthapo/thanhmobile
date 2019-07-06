<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Category;
use App\Providers\AppServiceProvider;

class HomeController extends Controller
{
    public function index(){
    	$slides = Slide::all();
    	$new_products = Product::orderBy('id','DESC')->paginate(8);
        $special_products = Product::orderBy('price', 'DESC')->paginate(8);
        $sale_products = Product::all();
    	$categories = Category::paginate();
        $laptops = Product::where('category_id',2)->get();
        $pcs = Product::where('category_id',3)->get();
    	return view('frontend.home.index')->with([
    		'new_products' => $new_products,
    		'categories' => $categories,
    		'slides' => $slides,
            'special_products' => $special_products,
            'sale_products' => $sale_products,
            'laptops' => $laptops,
            'pcs' => $pcs
    	]);
    }

}

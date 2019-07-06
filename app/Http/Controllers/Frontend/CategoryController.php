<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Providers\AppServiceProvider;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categories = Category::find($id);
        $danhmuc = Category::all();
        $special_products = Product::orderBy('price', 'DESC')->paginate(3);
      	$sp_theoloai = Product::where(['category_id'=>$id])->paginate(8);
    	return view('frontend.category.show')->with([
            'sp_theoloai' => $sp_theoloai, 
            'categories' => $categories,
            'danhmuc' => $danhmuc,
            'special_products' => $special_products ,
        ]);	 		
    }
}

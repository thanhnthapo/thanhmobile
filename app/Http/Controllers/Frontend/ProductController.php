<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show($productId)
    {
        //Sửa products
        $product = Product::find($productId);
        if (!$product) {
            abort(404);
        }
    	
    	$category = Category::where('id',$product->category_id)->first();
    	$sp_lienquan = Product::where('category_id',$product->category_id)->paginate(6);
    	// $products = Product::paginate();
    	return view('frontend.product.show')->with([
    		'product' => $product,
    		'sp_lienquan' => $sp_lienquan,
            'category'=> $category,
    	]);
    }
}

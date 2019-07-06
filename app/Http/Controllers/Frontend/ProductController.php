<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Detail;

class ProductController extends Controller
{
    public function show($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            abort(404);
        }
    	$details_img = DB::table('details')->select('id','img')->where('product_id',$product->id)->get();
    	$category = Category::where('id',$product->category_id)->first();
    	$sp_lienquan = Product::where('category_id',$product->category_id)->paginate(6);
    	// $products = Product::paginate();
    	return view('frontend.product.show')->with([
    		'product' => $product,
    		'sp_lienquan' => $sp_lienquan,
            'category'=> $category,
            'details_img'=> $details_img,
    	]);
    }
}

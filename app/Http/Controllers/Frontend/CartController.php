<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function listCart(Request $request)
    {
        $carts = $request->session()->get('cart');
        $category = Category::get();
    	return view('frontend.cart.list')->with([
            'carts' => $carts,
            'category' => $category,
        ]);
    }

    public function insert(Request $request, $productId)
    {
    	$product = Product::find($productId);
    	$carts= $request ->session()->get('cart') ? $request ->session()->get('cart') : collect();//cart is key
    	
    	// $carts  = $request ->session()->get('cart');
    	if ($carts->count() == 0) {
    		$product->soluong = 1;
    		$carts->push($product);
    	}
    	else{
    		if($carts->where('id',$productId)->count() == 0){
    			$product->soluong = 1;
    			$carts->push($product);
    		}else{
    			$cartProduct = $carts->where('id', $productId)->first();
    			
    			$soluong = $cartProduct->soluong + 1;
    			foreach ($carts as $key => $item) {
    				if ($item->id == $productId) {
    					$carts[$key]->soluong = $soluong;
    				}
    			}
    		}
    	}
    	
    	$request->session()->put('cart',$carts);
    	return redirect()->route('cart.list');
    	
    	// dd($request->session()->forget('cart')); 

    }

    public function update(Request $request){
    	$request->all();
    }
    
    public function delete(Request $request, $productId){
    	$carts = $request->session()->get('cart');
        $key = $carts->search(function($item) use($productId){
            return $item->id == $productId;
        });
        $carts->pull($key);
        $request->session()->put('cart',$carts);
        return redirect()->route('cart.list');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Frontend\CartController;
use App\Models\Category;
class CheckoutController extends Controller
{
    public function show(Request $request)
    {
    	$carts = $request->session()->get('cart');
    	$category = Category::get();
    	return view('frontend.checkout.show')->with([
    		'carts' => $carts,
    		'category' => $category,
    	]);
    }
    public function insert(Request $request)
    {
    	$order = new Order;
    	@foreach ($collection as $value) {
    		
    	}
    	$order->product_id = $request->product_id;
    	$order->product_name = $request->product_name;
    	$order->product_img = $request->product_img;
    	$order->qty = $request->qty;
    	$order->price = $request->price;
    	$order->total_price = $request->total_price;
    	$order->customer_name = $request->customer_name;
    	$order->customer_phone = $request->customer_phone;
    	$order->customer_email = $request->customer_email;
    	$order->customer_address = $request->customer_address;
    	$order->save();
    }
}

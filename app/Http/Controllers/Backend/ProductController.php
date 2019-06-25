<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\CreateProductRequest;
use App\Http\Requests\Backend\Product\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        $category = Category::get();
        return view('backend.product.index')->with([
            'products' => $products,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('backend.product.create')->with([
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        try {
            $filename = $request->img->getClientOriginalName();
            $request->img->storeAs('uploads', $filename);
            Product::Create([
                'name' => $request->name,
                'decription' => $request->decription,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'product_code' => $request->product_code,
                'qty' => $request->qty,
                'img' => $filename,
            ]);
            return redirect(route('product.index'));
        } catch(Exception $e) {
            // unlink('uploads'.$filename);
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        return view('backend.product.edit')->with([
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $filename = $request->img->getClientOriginalName();
        $request->img->storeAs('uploads', $filename);
        $product->update([
            'name' => $request->name,
            'decription' => $request->decription,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'product_code' => $request->product_code,
            'qty' => $request->qty,
            'img' => $filename,
        ]);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect(route('product.index'));
    }

    public function deleteProductByAjax(Request $request)
    {
        return response()->json([
            'status' => Product::destroy($request->id)
        ]);
    }
}

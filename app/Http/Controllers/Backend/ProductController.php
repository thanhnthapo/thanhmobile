<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Detail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\CreateProductRequest;
use App\Http\Requests\Backend\Product\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;


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
        $category = Category::select('id','name')->get();
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
        $product = Product::find($id);
         if (!$product) {
            abort(404);
        }
        $filename = $request->img->getClientOriginalName();
        $request->img->storeAs('uploads', $filename);     
        $product = new Product(); 
        $product->name = $request->name;
        $product->decription = $request->decription;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->product_code = $request->product_code;
        $product->qty = $request->qty;
        $product->img = $filename;
        $product->save();
        $product_id = $product->id;
        if ($request->hasFile('detail_img')) {
            foreach ($request->file('detail_img') as $fileDetail) {
                $detail_img = new Detail();
                if(isset($fileDetail)){
                    $detail_img->img = $fileDetail->getClientOriginalName();
                    $detail_img->product_id = $product_id;
                    $fileDetail->move('uploads/details/', $fileDetail->getClientOriginalName());
                    $detail_img->save();
                }
            }
        }
        return redirect(route('product.index'));

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
        $product = Product::findOrFail($id);

        if (!$product) {
            abort(404);
        }
        $category = Category::get();
        return view('backend.product.edit')->with([
            'product' => $product,
            'category' => $category,
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
        $product->name = $request->get('name');
        $product->category_id = $request->get('category_id');
        $product->product_code = $request->get('product_code');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->decription = $request->get('decription');
        $img_product = 'uploads/'.$request->get('img_product');
        if (!empty($request->file('img'))) {
            $filename = $request->file('img')->getClientOriginalName();
            $product->img = $filename;
            $request->file('img')->storeAs('uploads', $filename);
            // if (file_exists($img_product)) {
            //     $request->file('img')->delete($img_product);
            // }
        }


        $product->save();
        return redirect()->route('product.index');

        // $filename = $request->img->getClientOriginalName();
        // $request->img->storeAs('uploads', $filename);
        // $product->update([
        //     'name' => $request->name,
        //     'decription' => $request->decription,
        //     'category_id' => $request->category_id,
        //     'price' => $request->price,
        //     'product_code' => $request->product_code,
        //     'qty' => $request->qty,
        //     'img' => $filename,
        // ]);
        // $product->save();
        // return redirect(route('product.index'));

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

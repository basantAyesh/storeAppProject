<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
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
        $products = Product::with('Store')->paginate(5);
        foreach ($products as $product) {
            $product->image = storage::disk('public')->url($product->image);
        }
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::get();
        return view('admin.products.create')->with('stores', $stores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('image');
        $imgname = time() + rand(1, 10000000) . '.' . $photo->getClientOriginalExtension();
        $path = "uploads/images/$imgname";
        Storage::disk('public')->put($path, file_get_contents($photo));
        $name = $request->input('name');
        $description = $request->input('description');
        $store_id = $request->input('store_id');
        $base_price = $request->input('base_price');
        $discount_price = $request->input('discount_price');
        $flag = $request->input('flag');

        $image = $path;
        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->store_id = $store_id;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->flag = $flag;
        $product->image = $image;
        $status = $product->save();
        return redirect()->back()->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $product->image = storage::disk('public')->url($product->image);
        $stores = Store::get();
        return view('admin.products.edit')->with('product', $product)->with('stores', $stores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product= Product::find($id);
        $input = $request->all();
        if($request->has('image')){
            $image = $request->file('image');
            $imgname = time()+rand(1,10000000).'.'.$image ->getClientOriginalExtension();
            $path ="uploads/img/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $input['image']= $path;
        }
        $product = $product->update($input);


        return redirect(route('products.index'));


//        $product = Product::find($id);
//        if ($request->has('image')) {
//
//
//            $image = $request->file('image');
//            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
//            $path = "uploads/images/$imgname";
//            Storage::disk('public')->put($path, file_get_contents($image));
//            $logo = $path;
//
//            $product->image = $logo;
//            $status = $product->save();
//
//        }
//
//
//        $input = $request->all();
//
//
//        $product = $product->update($input);
//
//        return redirect(route('products.index'));
//



//        if ($request->has('logo')) {
//            $image = $request->file('logo');
//            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
//            $path = "uploads/images/$imgname";
//            Storage::disk('public')->put($path, file_get_contents($image));
//            $logo = $path;
//            $product = Product::find($id);
//            $product->logo = $logo;
//            $status = $product->save();
//        }
//        $product = Product::find($id);
//        $product = $product->update($request->all());
//
//        return redirect()->back()->with('status', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

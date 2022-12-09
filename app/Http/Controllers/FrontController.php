<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    public function stores()
    {
        $stores = Store::paginate(5);
        foreach ($stores as $store) {
            $store->logo = storage::disk('public')->url($store->logo);
        }
        return view('welcome')->with('stores', $stores);
    }

    public function storeProducts($id)
    {
        $products = Product::where('store_id', $id)->with('Store')->paginate(5);
        foreach ($products as $product) {
            $product->image = storage::disk('public')->url($product->image);
        }
        return view('website.store_products')->with('products', $products);
    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        $searchProducts = Product::with('Store')->where('name', 'like', "%$search%")->paginate(5);
        foreach ($searchProducts as $product) {
            $product->image = storage::disk('public')->url($product->image);
        }
        return view('website.store_products')->with('products', $searchProducts);
    }
    public function storeTransaction($id){
        $product_id = $id;
        $product = Product::find($id);
        if($product->flag=="base_discount"){
            $price =$product->base_price;
        }
        else{
            $price =$product->discount_price;
        }
        $purchase_transaction = new PurchaseTransaction;
        $purchase_transaction->product_id = $product_id;
        $purchase_transaction->price = $price;
        $status = $purchase_transaction->save();
        return redirect()->back()->with('status', $status);
    }
}

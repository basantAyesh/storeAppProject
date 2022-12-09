<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::paginate(5);
        foreach ($stores as $store) {
            $store->logo = storage::disk('public')->url($store->logo);
        }
        return view('admin.stores.index')->with('stores', $stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('logo');
        $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
        $path = "uploads/images/$imgname";
        Storage::disk('public')->put($path, file_get_contents($image));
        $name = $request->input('name');
        $address = $request->input('address');
        $logo = $path;
        $store = new Store;
        $store->name = $name;
        $store->address = $address;
        $store->logo = $logo;
        $status = $store->save();
        return redirect()->back()->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::where('id', $id)->first();
        $store->logo = storage::disk('public')->url($store->logo);
        return view('admin.stores.edit')->with('store', $store);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('logo')) {
            $image = $request->file('logo');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $logo = $path;
            $store = Store::find($id);
            $store->logo = $logo;
            $status = $store->save();
        }
        $name = $request->input('name');
        $address = $request->input('address');
        $store = Store::find($id);
        $store->name = $name;
        $store->address = $address;
        $status = $store->save();
        return redirect()->back()->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::find($id)->delete();
        return redirect()->back();
    }
}

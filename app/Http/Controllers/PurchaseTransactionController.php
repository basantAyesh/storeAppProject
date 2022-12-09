<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;

class PurchaseTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showReport(Request $request)
    {

        $Report_data = PurchaseTransaction::with('Product')->selectRaw('product_id  , sum(price) as price')
            ->groupBy('product_id')
             ->get();

       // $total_price = PurchaseTransaction::selectRaw('sum(price) as price')->get();

        return view('admin.purchase_transactions.showReport')->with('Report_data', $Report_data);

    }

    public function index()
    {
        $purchase_transactions = PurchaseTransaction::with('Product')->paginate(5);
        return view('admin.purchase_transactions.index')->with('purchase_transactions', $purchase_transactions);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PurchaseTransaction $purchaseTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseTransaction $purchaseTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PurchaseTransaction $purchaseTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseTransaction $purchaseTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PurchaseTransaction $purchaseTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseTransaction $purchaseTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PurchaseTransaction $purchaseTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseTransaction $purchaseTransaction)
    {
        //
    }
}

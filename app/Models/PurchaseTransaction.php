<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PurchaseTransaction extends Model
{
    use HasFactory;
    use softDeletes;

    //  PurchaseTransaction belong to one product
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}

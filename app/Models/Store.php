<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use softDeletes;



    //Store has many Product
    public function Product(){
        return $this->hasMany(ProductController::class);
    }
}

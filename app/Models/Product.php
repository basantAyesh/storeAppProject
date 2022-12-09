<?php

namespace App\Models;

use App\Http\Controllers\StoreController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use softDeletes;
    protected $guarded = [];


    //Product belong to one store
    public function  Store(){
        return $this->belongsTo(Store::class);
    }
    //Product has many Purchase_Transactions
    public function Purchase_Transactions(){
        return $this->hasMany(PurchaseTransaction::class);
    }
}

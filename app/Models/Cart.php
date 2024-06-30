<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
    * GUARDED ATTRIBUTES
    */
    protected $guarded = [];

    /**
    * MANY TO ONE SPESIFIK
    * TABLE CARTS
    *  $table->foreignId('cashier_id')->references('id')->on('users')->cascadeOnDelete();
    */
    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    /**
    * MANY TO ONE
    * TABLE CARTS
    * $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
    */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    /**
    * GUARDED ATTRIBUTES
    */
    protected $guarded = [];

    /**
    * IMAGE CAST
    * TODO
    * use Illuminate\Database\Eloquent\Casts\Attribute;
    * Pastikan kode diatas sudah di import!
    */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/products/' . $value),
        );
    }

    /**
    * ONE TO MANY
    * TABLE TRANSACTIONS DETAILS
    * $table->foreignId('transaction_id')->references('id')->on('transactions')->cascadeOnDelete();
    */
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
    * ONE TO MANY
    * TABLE TRANSACTIONS DETAILS
    * $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
    */
    public function detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
    * ONE TO MANY
    * TABLE CARTS
    * $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
    */
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

}

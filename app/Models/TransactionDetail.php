<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
    * GUARDED ATTRIBUTES
    */
    protected $guarded = [];

    /**
    * MANY TO ONE
    * TABLE TRANSACTIONS DETAILS
    * $table->foreignId('transaction_id')->references('id')->on('transactions')->cascadeOnDelete();
    */
    public function details()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
    * MANY TO ONE
    * TABLE TRANSACTIONS DETAILS
    * $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
    */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

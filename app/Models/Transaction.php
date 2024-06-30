<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    /**
    * GUARDED ATTRIBUTES
    */
    protected $guarded = [];

    /**
     * MANY TO ONE SPESIFIK
     * TABLE TRANSACTIONS
     *  $table->foreignId('cashier_id')->references('id')->on('users')->cascadeOnDelete();
     */
    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    /**
    * MANY TO ONE
    * TABLE TRANSACTIONS
    * $table->foreignId('customer_id')->nullable()->references('id')->on('customers')->cascadeOnDelete();
    */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
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
    * TABLE PROFITS
    * $table->foreignId('transaction_id')->references('id')->on('transactions')->cascadeOnDelete();
    */
    public function profits()
    {
        return $this->hasMany(Profit::class);
    }

    /**
    * CREATED AT
    * TODO
    * use Illuminate\Database\Eloquent\Casts\Attribute; dan use Carbon\Carbon;
    * Pastikan kode diatas sudah di import!
    */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y H:i:s'),
        );
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'user_id',
        'package_id',
        'payment_method_id',
        'transaction_id',
        'username',
        'package_name',
        'payment_method_name',
        'base_amount',
        'base_currency',
        'paid_amount',
        'paid_currency',
        'purchase_date',
    ];

    protected $dates = ['purchase_date'];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package() :BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function paymentMethod() :BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function subscription() :HasOne
    {
        return $this->hasOne(Subscription::class);
    }
}

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
        'response_content'
    ];

    protected $casts=[
        'response_content'=>'array',
        'purchase_date'=>'datetime'
    ];


    public function getRouteKeyName(): string
    {
        return 'transaction_id';
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'firstname'=>$this->username,
            'lastname'=>''
        ]);
    }

    public function package() :BelongsTo
    {
        return $this->belongsTo(Package::class)->withTrashed()->withDefault([
            'name'=>$this->package_name
        ]);
    }

    public function payment_method() :BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class)->withTrashed()->withDefault([
            'name'=>$this->payment_method_name
        ]);
    }

    public function subscription() :HasOne
    {
        return $this->hasOne(Subscription::class)->withTrashed()->withDefault();
    }
}

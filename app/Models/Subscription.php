<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'order_id',
        'purchase_date',
        'expire_date',
        'status',
    ];


    protected $casts= [
        'purchase_date'=>'datetime', 
        'expire_date'=>'datetime'
    ];

    // protected $dates = ['purchase_date', 'expire_date'];

    public function order() :BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}

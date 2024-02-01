<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory,SoftDeletes;

    public $appends=['date'];

    protected $fillable=[
        'sender_id',
        'receiver_id',
        'content',
        'seen'
    ];

    protected $casts=[
        'seen'=>'boolean',
        'created_at'=>'datetime:d M, Y, h:i A'
    ];

    public function receiver() :BelongsTo
    {
        return $this->belongsTo(User::class,'receiver_id','id');
    }

    public function sender() :BelongsTo
    {
        return $this->belongsTo(User::class,'sender_id','id');
    }

    public function getDateAttribute() 
    {
        return $this->created_at->diffForHumans(now(), CarbonInterface::DIFF_ABSOLUTE);
    }
}

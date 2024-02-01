<?php

namespace App\Http\Controllers\Frontend\Dashboard\Chat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request,User $sender)
    {
        $messages=Message::with('sender','receiver')
                ->where(fn (Builder $query)=>$query->where('sender_id',$sender->id)->where('receiver_id',auth()->id())->latest()->get())
                ->orWhere(fn(Builder $query)=>$query->where('receiver_id',$sender->id)->where('sender_id',auth()->id())->latest()->get())
                ->get();

        return compact('messages');
    }
}

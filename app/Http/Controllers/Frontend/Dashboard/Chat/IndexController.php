<?php

namespace App\Http\Controllers\Frontend\Dashboard\Chat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request,User $sender)
    {
        $messages=Message::with('sender','receiver')->where('sender_id',$sender->id)->where('receiver_id',auth()->id())->latest()->get();

        return compact('messages');
    }
}

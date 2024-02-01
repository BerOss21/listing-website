<?php

namespace App\Http\Controllers\Frontend\Dashboard\Chat;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SenderController extends Controller
{
    public function __invoke(Request $request)
    {
        // $senders=Message::where('receiver_id',auth()->id())->with('receiver')->latest()->get();

        $senders=User::select('id','avatar','firstname','lastname')
                        ->whereRelation('sent_messages','receiver_id',auth()->id())
                        ->orWhere(function($query){
                            $query->whereRelation('received_messages','sender_id',auth()->id());
                        })
                        ->with(['last_sent_message'])
                        ->get();

        return compact('senders');
    }
}

<?php

namespace App\Http\Controllers\Frontend\Dashboard\Chat;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MessageRequest;

class StoreController extends Controller
{
    public function __invoke(MessageRequest $request,User $receiver)
    {
        $message=$receiver->received_messages()->create([...$request->validated(),'sender_id'=>auth()->id()]);

        if($request->ajax()) return $message;

        toastr()->success('Your message was sent successfully');

        return back();
    }
}
<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('message.{receiverId}', function (User $user, int $receiverId) {
    return $user->id === $receiverId;
});

Broadcast::channel('listing_website', function (User $user) {
    if(auth()->check())
    {
        return ['id' => $user->id, 'name' => $user->fitsname.' '.$user->lastname];
    }
   
});



// Broadcast::channel('message.{roomId}', function (User $user, int $roomId) {

//     $messages = Message::where(function ($query) use($roomId){
//         $query->where(DB::raw('receiver_id + sender_id'), '=', $roomId);
//     })->fis();
    
//     if ($user->id === $roomId) 
//     {
        
//         return ['id' => $user->id, 'name' => $user->fitsname.' '.$user->lastname];
//     }
// });
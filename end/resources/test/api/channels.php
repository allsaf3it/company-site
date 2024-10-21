<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use \App\Broadcasting\UsdtChannel;

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

// Broadcast::channel('App.Models.Usdt.{id}', function ($user, $id) {
// //    return (int) $user->id === (int) $id;
//     return true;
// });
Broadcast::channel('App.Models.Usdt.{id}', UsdtChannel::class);

Broadcast::channel('chat-channel', function ($user) {
    return auth('usdt')->check();
});

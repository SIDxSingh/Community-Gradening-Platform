<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.garden.{id}', function ($user, $id) {
    // Anyone logged in can join the garden chat
    return $user !== null;
});

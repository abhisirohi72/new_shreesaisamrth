<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('admin.chat', function ($user) {
    // return $user->user_type === '1'; // Allow only admins
    return true; // Allow all authenticated users
});

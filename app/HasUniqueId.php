<?php

namespace App;
use Illuminate\Support\Str;

trait HasUniqueId
{
    public static function generateUniqueAlphaNum($length = 7)
    {
        do {
            $uniqueId = '';
            for ($i = 0; $i < $length; $i++) {
                $uniqueId .= mt_rand(0, 9); // generates a random digit
            }
        } while (\App\Models\User::where('unique_id', $uniqueId)->exists());

        return $uniqueId;
    }
}

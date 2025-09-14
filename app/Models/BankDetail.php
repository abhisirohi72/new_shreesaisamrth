<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BankDetail extends Model
{
    protected $guarded= [];

    /**
     * Get the user that owns the bank detail.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

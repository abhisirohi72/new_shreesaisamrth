<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserPackagePurchase;

class Investment extends Model
{
    protected $guarded = [];

    public function userPackagePurchase(){
        return $this->belongsTo(UserPackagePurchase::class, "package_id", "id");
    }
}

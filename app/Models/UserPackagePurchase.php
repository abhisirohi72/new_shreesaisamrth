<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Investment;

class UserPackagePurchase extends Model
{
    protected $guarded =[];

    public function investment(){
        return $this->hasOne(Investment::class,"id", "package_id");
    }

    public function package_distributions(){
        return $this->hasMany(PackageDistribution::class, "package_id", "package_id");
    }
}

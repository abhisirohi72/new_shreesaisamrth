<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DirectIncome;
use App\Models\ReferalIncome;
use App\Models\RewardsIncome;
use App\Models\AddViewIncome;
use App\Models\TaskIncome;
use App\Models\BusinessVolume;
use App\Models\PurchaseVolume;
use App\Models\PlanPurchase;

class Plan extends Model
{
    protected $guarded= [];

    public function direct_income(){
        return $this->hasOne(DirectIncome::class);
    }

    public function referal_income(){
        return $this->hasOne(ReferalIncome::class);
    }

    public function rewards_income(){
        return $this->hasOne(RewardsIncome::class);
    }

    public function add_view_income(){
        return $this->hasOne(AddViewIncome::class);
    }

    public function task_income(){
        return $this->hasOne(TaskIncome::class);
    }

    public function business_volume(){
        return $this->hasOne(BusinessVolume::class);
    }

    public function purchase_volume(){
        return $this->hasOne(PurchaseVolume::class);
    }

    public function plan_purchase(){
        return $this->hasMany(PlanPurchase::class);
    }
}

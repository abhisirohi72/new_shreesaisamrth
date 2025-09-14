<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\BankDetail;
use App\Models\KycDetail;
use App\Models\UserWithdrawl;
use App\Models\DepositFund;
use app\Models\AdminAddFund;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'sponsor_id',
        'user_type',
        'phone',
        'address',
        'city',
        'state',
        'zipcode',
        'main_pass',
        'unique_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Get children (downlines)
    public function downlines()
    {
        return $this->hasMany(User::class, 'sponsor_id');
    }

    public function sponsor(){
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    /**
     * Get the bank details associated with the user.
     */
    public function bankDetails()
    {
        return $this->hasMany(BankDetail::class);
    }

    /**
     * Get the bank details associated with the user.
     */
    public function kycDetails()
    {
        return $this->hasMany(KycDetail::class);
    }

    /**
     * Get the withdrawl details associated with the user.
     */
    public function userWithdrawl()
    {
        // return $this->hasMany(UserWithdrawl::class);
        return $this->hasOne(UserWithdrawl::class)
                ->where('status', 1)
                ->whereIn("details", ['bank', 'usdt'])
                ->latest('id');
    }

    /**
     * Get the deposit fund associated with the user.
     */
    public function depositFunds()
    {
        return $this->hasMany(DepositFund::class);
    }

    /**
     * Get the add fund associated with the user.
     */
    public function adminaddfunds()
    {
        return $this->hasMany(AdminAddFund::class);
    }
}

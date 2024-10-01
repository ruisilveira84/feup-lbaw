<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'is_banned',
        'credit',
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'credit' => 'float',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }

    public function isVerified()
    {
        // Implement verification logic
        return $this->email_verified_at !== null;
    }

    public function canBid()
    {
        // Implement additional conditions for bidding if needed
        return $this->isVerified();
    }

    public function bidderSeller(): HasOne {
        return $this->hasOne(BidderSeller::class, 'bidder_seller_id', 'user_id');
    }

}

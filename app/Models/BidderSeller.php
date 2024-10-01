<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BidderSeller extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'bidder_seller';

    protected $primaryKey = 'bidder_seller_id';
    
    protected $fillable = [
        'bidder_seller_id',
        'address_id',
        'rating'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'bidder_seller_id', 'user_id');
    }

    public function paymentMethod() : HasOne {
        return $this->hasOne(PaymentMethod::class, 'bidder_seller_id', 'bidder_seller_id');
    }

    public function address() : BelongsTo {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function auctions(): HasMany {
        return $this->hasMany(Auction::class, 'bidder_seller_id');
    }

    public function bids(): HasMany {
        return $this->hasMany(Bid::class, 'bidder_seller_id');
    }
}

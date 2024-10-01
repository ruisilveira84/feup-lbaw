<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Auction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'auction';

    protected $fillable = [
        'current_bid',
        'bidder_seller_id',
        'initial_date',
        'final_date',
        'initial_bid',
        'status'
    ];

    protected $primaryKey = 'auction_id';

    // Make sure 'final_date' is cast to a Carbon instance
    protected $dates = [
        'initial_date',
        'final_date' => 'datetime:Y-m-d H:i:s', // specifying the format
    ];

    public function item() : HasOne {
        return $this->hasOne(Item::class, 'auction_id', 'auction_id');
    }

    public function seller() : BelongsTo {
        return $this->belongsTo(User::class, 'bidder_seller_id', 'user_id');
    }

    public function items() {
        return $this->hasMany(Item::class, 'auction_id');
    }
}

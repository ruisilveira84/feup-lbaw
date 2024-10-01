<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Auction;

class Bid extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $table = 'bid';

    protected $primaryKey = 'bid_id';

    protected $fillable = [
        'bidder_seller_id',
        'auction_id',
        'bidding_date',
        'amount'
    ];

    public function auction(): BelongsTo {
        return $this->belongsTo(Auction::class, 'auction_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\BidderSeller;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'address';

    protected $primaryKey = 'address_id';

    protected $fillable = [
        'street',
        'city',
        'zipcode',
        'country'
    ];

    public function bidderSeller(): BelongsTo {
        return $this->belongsTo(BidderSeller::class, 'bidder_seller_id', 'bidder_seller_id');
    }
}

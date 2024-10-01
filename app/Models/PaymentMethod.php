<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'payment_method';

    protected $primaryKey = 'payment_method_id';

    protected $fillable = [
        'bidder_seller_id'
    ];

    public function bidderSeller(): BelongsTo {
        return $this->belongsTo(BidderSeller::class, 'bidder_seller_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Auction;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'item';

    protected $primaryKey = 'item_id';

    protected $fillable = [
        'auction_id',
        'item_name',
        'shipping',
        'description',
        'kind'
    ];

    public function auction() {
        return $this->belongsTo(Auction::class, 'auction_id', 'auction_id');
    }

}

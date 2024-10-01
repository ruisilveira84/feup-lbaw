<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'bidder_seller_id',
        'contents',
        'sent_date',
        'seen',
        'kind'
    ];
}

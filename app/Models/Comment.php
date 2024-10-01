<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'bidder_seller_id',
        'auction_id',
        'comment_date',
        'contents'
    ];
}

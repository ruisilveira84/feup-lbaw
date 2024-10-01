<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'card';

    protected $primaryKey = 'card_id';

    protected $fillable = ['card_id', 'number', 'holder_name', 'exp_date', 'cvv'];
}

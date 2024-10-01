<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'paypal';

    protected $primaryKey = 'paypal_id';

    protected $fillable = ['paypal_id', 'email'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administrator extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'administrator';

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_id'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'admin_id', 'user_id');
    }
}

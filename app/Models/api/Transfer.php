<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'to_id',
        'amount_brl',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

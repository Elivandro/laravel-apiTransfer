<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'ddd',
        'phone',
        'description',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

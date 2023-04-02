<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }
}

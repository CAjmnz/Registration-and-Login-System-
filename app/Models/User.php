<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'address',
        'contactno',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'age',
    ];

    protected $casts = [
        'birthday' => 'date',
        'is_admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function getAgeAttribute(): ?int
    {
        return $this->birthday ? $this->birthday->age : null;
    }
}
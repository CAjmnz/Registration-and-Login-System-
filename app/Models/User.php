<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Setting;

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
        'password' => 'hashed',
    ];

    public function getAgeAttribute(): ?int
    {
        return $this->birthday ? $this->birthday->age : null;
    }

    /**
     * Relationship:
     * User has one Setting
     */
    public function setting()
    {
        return $this->hasOne(Setting::class, 'user_id', 'id');
    }
protected static function booted()
{
    static::created(function ($user) {
        $user->setting()->firstOrCreate(
            [],
            ['theme' => 'light', 'font_size' => 'medium']
        );
    });
}
}

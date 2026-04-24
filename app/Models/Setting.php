<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'user_id',
        'theme',
        'font_size',
    ];

    /**
     * Relationship:
     * Setting belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
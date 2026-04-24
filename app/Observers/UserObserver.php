<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Setting;

class UserObserver
{
    public function created(User $user): void
    {
        // handled in User::booted()
    }
}
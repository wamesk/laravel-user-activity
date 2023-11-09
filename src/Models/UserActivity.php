<?php

namespace Wamesk\LaravelUserActivity\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    const UPDATED_AT = false;

    /**
     * @return void
     */
    public function user(): void
    {
        $this->belongsTo(config('laravel-user-activity.user_class', 'App\Models\User'));
    }
}

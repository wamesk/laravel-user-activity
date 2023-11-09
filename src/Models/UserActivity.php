<?php

namespace Wame\LaravelUserActivity\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasUlids;

    const UPDATED_AT = null;

    /**
     * @return void
     */
    public function user(): void
    {
        $this->belongsTo(config('laravel-user-activity.user_class', 'App\Models\User'));
    }
}

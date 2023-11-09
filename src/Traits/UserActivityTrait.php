<?php

namespace Wamesk\LaravelUserActivity\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Wamesk\LaravelUserActivity\Models\UserActivity;

trait UserActivityTrait
{
    /**
     * @return HasMany
     */
    public function userActivities(): HasMany
    {
        return $this->hasMany(UserActivity::class);
    }
}

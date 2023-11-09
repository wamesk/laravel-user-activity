<?php

namespace Wame\LaravelUserActivity\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Wame\LaravelUserActivity\Models\UserActivity;

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

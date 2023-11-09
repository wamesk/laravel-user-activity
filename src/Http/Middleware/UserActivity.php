<?php

namespace Wame\LaravelUserActivity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Strings;
use Wame\LaravelUserActivity\Traits\UserActivityTrait;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Strings::startsWith($request->getRequestUri(), '/api/v')) {
            /** @var UserActivityTrait $user */
            $user = $request->user();

            if (isset($user) && !$user->userActivities()->whereDate('created_at', '=', now()->format('Y-m-d'))->count()) {
                $user->userActivities()->create();
            }
        }

        return $next($request);
    }
}

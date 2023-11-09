<?php

namespace Wamesk\LaravelUserActivity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use Wamesk\LaravelUserActivity\Traits\UserActivityTrait;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return void
     */
    public function handle(Request $request, Closure $next)
    {
        if (Strings::startsWith($request->getRequestUri(), '/api/v')) {
            /** @var UserActivityTrait $user */
            $user = auth()->user();

//            if (isset($user)) {
//
//            }
        }
    }
}

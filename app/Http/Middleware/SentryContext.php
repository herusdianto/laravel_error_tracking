<?php

namespace App\Http\Middleware;

use Closure;

class SentryContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app()->environment('production')) {
            if (app()->bound('sentry')) {
                /** @var \Raven_Client $sentry */
                $sentry = app('sentry');

                $is_logged_in = auth()->check();

                // Add user context
                if ($is_logged_in) {
                    $user = auth()->user();

                    $sentry->user_context([
                        'id'    => $user->id,
                        'name'  => $user->name,
                        'email' => $user->email,
                    ]);
                }
            }
        }

        return $next($request);
    }
}

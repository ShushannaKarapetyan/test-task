<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class CheckIsAdmin {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Support\Facades\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->roles->name === 'Admin') {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}

<?php

namespace App\Http\Middleware;

use App\ApiRes;
use Closure;
use Illuminate\Support\Facades\Hash;

class ToApi
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
        // if (empty($request->bearerToken()) || $request->bearerToken() != 'oeCKugiK3WTpa4notnHruE9bH0csidiHsj0x5d8VBjMu9Y') {
            // return response()->json(ApiRes::send(0, 'Authorization invalid'));
        // }
        return $next($request);
    }
}

<?php

namespace Modules\Referral\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetReferralCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if($referral = $request->referral) {
         cookie()->queue(cookie()->forever('referral', $referral));
       }
      return $next($request);
    }
}

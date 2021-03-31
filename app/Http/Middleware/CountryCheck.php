<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//we willl apply this middleware on al the routs
//so it is used as global middleware
//we need to register it into the kernel.php

class CountryCheck
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
        if($request->country && !in_array($request->country, array("us","in","afg")))
        {
            return redirect("noAccess");
        }
        return $next($request);
    }
}

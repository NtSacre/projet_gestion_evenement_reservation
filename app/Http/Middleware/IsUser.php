<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userAssoc= $request->user();
        if($userAssoc && $userAssoc instanceof Client && $userAssoc->Role==="user"){
            return $next($request);
        }else{
            return back();
        }
        
    }
}

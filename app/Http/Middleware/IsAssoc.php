<?php

namespace App\Http\Middleware;

use App\Models\Association;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAssoc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $userAssoc= $request->user();
        if($userAssoc && $userAssoc instanceof Association && $userAssoc->Role==="association"){
            return $next($request);
        }else{
            return view('AllUsers.home');
        }

    }
}

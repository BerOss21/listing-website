<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NumberOfListing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!auth()->user()->orders()->count())
        {
            toastr()->success('You should subscribe to create listings!');

            return back(); 
        }

        else if(auth()->user()->listings()->count() < auth()->user()->latestOrder->package->number_of_listings)
        {
            return $next($request);
        }

        else
        {
            toastr()->error('you have exceeded the maximum number of listings!');

            return back(); 
        }
        
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class VerifySession
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
        if($request->session()->has('user_name')){
            return $next($request);
        }else{
            $request->session()->flash('msg', 'Please login first!');
            return redirect('/manager/login');
        } 
    }
}

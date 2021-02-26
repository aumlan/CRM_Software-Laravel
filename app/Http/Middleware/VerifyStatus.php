<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyStatus
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
        if($request->session()->has('user_status')){
            return $next($request);
        }else{
            $request->session()->flash('msg', 'You are no longer a valid user!');
            return redirect('/manager/login');
        } 
    }
}

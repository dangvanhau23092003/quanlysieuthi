<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user=Auth::user();
                if($user->level==1 || $user->level==2){
                    return $next($request);
                }
                else {
                    return redirect('/');
                }
            }
            else {
                return redirect('/login');
            }
        // return $next($request);
        // if(!Auth::user()) {
        //     return redirect()->route('login');
        // }
        // if(Auth::user()->level== 1) {
        //     return redirect()->route('admin.dashboard');
        // }
        // if(Auth::user()->level== 3) {
        //     return redirect()->route('index');
        // }
    }
}

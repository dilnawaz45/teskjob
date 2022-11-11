<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $loginAuth=0;
        if(session()->has('username') && session()->has('password') && session()->has('type') ){
            $user_cnt = User::where(["username" => session('username'), "password" => session('password')])->count();
            if($user_cnt>0){
                $loginAuth=1;
            }
        }


        if($loginAuth==0){
           return redirect( route('logout') );
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check()){
            $user = Auth::user();
            // if(($user->is_super_admin == 1) || ($user->is_super_admin && $user->is_donor == 1)){
            if($user->is_super_admin == 1 || $user->is_admin_group == 1){
            return $next($request);
            }else {
            Auth::logout();
            return redirect('/login')->with('error','You are not authorized to access this page.');
            }
        }else {
            //Auth::logout();
            return redirect('/login')->with('error','Please login and come again. Thanks.');
        }
    }
}

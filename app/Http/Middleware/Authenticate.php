<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if(!$request->expectsJson()){
            
            if($request->is('super/*')){
                session('fail', 'You must login first');
                return route('super.login');
            }
            else if($request->is('admin/*')){
                session()->has('key')? session()->forget('key'):null;
                session('fail', 'You must login first');
                return route('admin.login');
            }
            else if(session()->has('key')){
                session('fail', 'You must login first');
                return route('admin.login');
            }
            else if($request->is('user/*')){
                session('fail', 'You must login first');
                return route('user.role.enterprise.index');
            }
        }
    }
}

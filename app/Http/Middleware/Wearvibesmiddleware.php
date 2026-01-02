<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use App\Models\user;
use PhpParser\Node\Stmt\Return_;

class Wearvibesmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has('logined'))
        {
            $user = user::find(Session::get('logined'));
            if($user){
                return $next($request);
            }else{                
                Session::forget('logined');
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
        
    }
}

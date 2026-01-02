<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('login_user')) {
            return redirect('/login');
        }

        $user = User::find(Session::get('login_user'));

        if (!$user || $user->email !== 'admin@wearvibes.com') {
            return redirect('/profile')->with('error', 'Unauthorized');
        }

        return $next($request);
    }
}

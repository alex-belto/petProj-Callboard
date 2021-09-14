<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Role;

class AdminAccess
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
        $user = Auth::user();
        $roles = $user -> roles;

        foreach($roles as $role)
        {
            if($role -> name == 'admin' OR $role -> name == 'moderator')
            {
                return $next($request);
            }
        }
        return redirect('/');
    }
}

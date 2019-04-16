<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    public function handle($request, Closure $next)
    {
        if($request->user() === null){
            return redirect()->route('login');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if($request->user()->hasAnyRole($roles) || !$roles){
            return $next($request);
        }
        session()->flash('flash-warning', 'Você não contém permissão para isso.');
        return redirect()->back();
    }
}

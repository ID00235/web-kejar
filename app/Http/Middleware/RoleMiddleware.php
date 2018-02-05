<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $allow  = false;        
        $roleOr = explode("||", $role);
        if(count($roleOr)>1){
            foreach($roleOr as $rl){
                if ($request->user()->hasRole($rl)) {
                    $allow = true;
                }
            }
        }else{
            if ($request->user()->hasRole($role)) {
                $allow = true;
            }
        }
        if(!$allow){
            throw new HttpException(503);
        }
        return $next($request);
    }

}

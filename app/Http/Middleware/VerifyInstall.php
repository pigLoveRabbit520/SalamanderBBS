<?php

namespace App\Http\Middleware;

use Closure;

class VerifyInstall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $file = public_path() . '\install.lock';
        if (!is_file($file)){
            if($request->path() == 'install') {
                return $next($request);
            } else {
                return redirect('install');
            }
        } else {
            return $next($request);
        }
    }
}

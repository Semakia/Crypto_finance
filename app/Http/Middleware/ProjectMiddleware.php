<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProjectMiddleware
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
        $user = getLogInUser();
        $projectCount = $user->campaigns->count();
        if($projectCount < 1) {
            return redirect()->route('project.wizard');
        }
        return $next($request);
    }
}

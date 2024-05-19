<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Fonctionnaire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if ($user->fonction == 'Fonctionnaire') {
            return $next($request);
        }
        if ($user->fonction == 'Secretaire') {
            return redirect('/Secretaire');
        }
        if ($user->fonction == 'Chef_departement') {
            return redirect('/Chef_departement');
        }
        if ($user->fonction == 'Chef_service') {
            return redirect('/Chef_service');
        }
        if ($user->fonction == 'Directeur') {
            return redirect('/Directeur');
        }
    }
}

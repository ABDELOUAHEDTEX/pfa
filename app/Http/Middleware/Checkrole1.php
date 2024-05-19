<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkrole1
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez le rôle de l'utilisateur
        if ($request->user() && 
            ($request->user()->fonction === 'Directeur' || 
             $request->user()->fonction === 'Secretaire' || 
             $request->user()->fonction === 'Chef_departement' || 
             $request->user()->fonction === 'Chef_service')) {
            // Autoriser l'accès pour les utilisateurs ayant les rôles spécifiés
            return $next($request);
        }

        // Retourner une réponse avec un message d'erreur 403 (Accès interdit)
        return response()->view('acces-refuse', [], 403);
    }
}



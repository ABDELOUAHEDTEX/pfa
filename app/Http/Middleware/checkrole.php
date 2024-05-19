<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez le rôle de l'utilisateur
        if ($request->user() && $request->user()->fonction !== 'Directeur') {
            // Retourne une réponse avec un message d'erreur 403 (Accès interdit)
            return response()->view('acces-refuse', [], 403);
        }

        // Autoriser l'accès à la fonction "approbation" pour les utilisateurs ayant le rôle de Directeur
        return $next($request);
    }
}

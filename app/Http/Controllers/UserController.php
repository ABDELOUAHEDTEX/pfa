<?php

namespace App\Http\Controllers;

use App\Models\User; // Assurez-vous d'importer le modèle User si ce n'est pas déjà fait
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Supprime l'utilisateur spécifié.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherchez l'utilisateur à supprimer dans la base de données
        $user = User::find($id);

        // Vérifiez si l'utilisateur existe
        if ($user) {
            // Supprimez l'utilisateur
            $user->delete();

            // Redirigez l'utilisateur vers une autre page avec un message de succès
            return redirect()->route('liste-utilisateurs')->with('success', 'Utilisateur supprimé avec succès.');
        } else {
            // Redirigez l'utilisateur vers une autre page avec un message d'erreur
            return redirect()->route('liste-utilisateurs')->with('error', 'Utilisateur non trouvé.');
        }
    }
}

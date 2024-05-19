<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SupprimerUtilisateurController extends Controller
{
    public function afficherUtilisateurs()
    {
        $users = User::all();
        return view('supprimer-utilisateur', compact('users'));
    }

    public function supprimerUtilisateur($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('liste-utilisateurs')->with('success', 'Utilisateur supprimé avec succès.');
    }
    public function liste()
    {
        $users = User::all();
        return view('supprimer-utilisateur', ['users' => $users]);
    }
}

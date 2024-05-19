<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AjouterUserController extends Controller
{
    public function ajouter(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'fonction' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Création de l'utilisateur en utilisant le modèle User
        $user = User::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'service' => $validatedData['service'],
            'fonction' => $validatedData['fonction'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // hasher le mot de passe
        ]);

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'L\'utilisateur a été ajouté avec succès.');
    }
}

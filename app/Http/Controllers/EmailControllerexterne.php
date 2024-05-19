<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailControllerexterne extends Controller
{
    public function showForm()
        {
            return view('transfert');
        }
    
        public function submitEmail(Request $request)
        {
            // Traitement de la soumission du formulaire
            // Vous pouvez ajouter ici la logique pour valider les données du formulaire, envoyer un e-mail, etc.
            // Par exemple, pour accéder aux données du formulaire : $request->input('nom_du_champ')
            
            // Redirigez l'utilisateur vers une autre page après le traitement
            return redirect('/trasfert')->with('success', 'Votre e-mail a été envoyé avec succès!');
        }
    }

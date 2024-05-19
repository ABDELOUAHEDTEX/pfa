<?php

namespace App\Http\Controllers;

use App\Models\Supprime;
use App\Models\Courrier;
use Illuminate\Http\Request;

class SupprimerCourrierController extends Controller
{
    public function supprimerCourrier($id)
    {
        // Récupérer le courrier à supprimer
        $courrier = Courrier::findOrFail($id);

        // Créer une entrée dans la table "supprime"
        Supprime::create([
            'reference' => $courrier->reference,
            'date' => $courrier->date,
            'envoye_depuis' => $courrier->envoye_depuis,
            'objet' => $courrier->objet,
            'message' => $courrier->message,
            'attachment' => $courrier->attachment
        ]);

        // Supprimer le courrier de la table "new_courrier"
        $courrier->delete();

        // Rediriger avec un message de succès ou toute autre logique nécessaire
        return redirect()->back()->with('success', 'Le courrier a été supprimé avec succès et déplacé vers la table "supprime".');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courrier; // Assurez-vous d'importer le modèle Courrier si ce n'est pas déjà fait

class StatistiqueController extends Controller
{
    public function index()
    {
        // Récupérer le total des courriers déjà traités
        $courriersTraites = Courrier::where('traite', true)->count();

        // Récupérer le total des courriers non traités
        $courriersNonTraites = Courrier::where('traite', false)->count();

        return view('statistique', compact('courriersTraites', 'courriersNonTraites'));
    }
}

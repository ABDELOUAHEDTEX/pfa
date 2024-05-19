<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnvoyeA; // Assurez-vous d'importer le modèle envoye_a



class EnvoyeController extends Controller
{
    public function index()
    {
        $ecourriers = EnvoyeA::all();

        return view('envoye', compact('ecourriers'));
        
    }
}


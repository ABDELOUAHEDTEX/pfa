<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransfertController extends Controller
{
    public function transfertAction(Request $request)
    {
        // Logique de traitement du formulaire de transfert ici
        return view('transfert'); // Rediriger vers la vue transfert.blade.php
    }
    
}

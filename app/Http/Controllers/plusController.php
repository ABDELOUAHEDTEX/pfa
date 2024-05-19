<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class plusController extends Controller
{
    public function afficherPlus()
    {
        // Logique pour afficher la page "Plus"
        return view('plus');
    }
}

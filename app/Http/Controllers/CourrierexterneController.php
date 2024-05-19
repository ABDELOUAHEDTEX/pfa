<?php

namespace App\Http\Controllers;

use App\Models\NewCourrierexterne;


use Illuminate\Http\Request;

class CourrierexterneController extends Controller
{
    public function storeexterne(Request $request)
    { // Validate the form data
        $validatedData = $request->validate([
            'reference' => 'required',
            'date' => 'required|date',
            'envoye_a' => 'required|email',
            'objet' => 'nullable',
            'message' => 'nullable',
        ]);
 
        // Create a new NewCourrierEXTERNE entry
        $newCourrierexterne = NewCourrierexterne::create([
            'reference' => $validatedData['reference'],
            'date' => $validatedData['date'],
            'envoye_a' => $validatedData['envoye_a'],
            'objet' => $validatedData['objet'],
            'message' => $validatedData['message'],
        ]);
        

        return redirect()->back()->with('success1', 'Courrier en attente d\'approbation');
    }
}
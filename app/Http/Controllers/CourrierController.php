<?php

namespace App\Http\Controllers;

use App\Models\NewCourrier;
use App\Models\EnvoyeA;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'reference' => 'required',
            'date' => 'required|date',
            'envoye_depuis' => 'required',
            'envoye_a' => 'required|array',
            'envoye_a.*' => 'required|string',
            'objet' => 'nullable',
            'message' => 'nullable',
            'attachment.*' => 'nullable|file',
        ]);

        // Create a new NewCourrier entry
        $newCourrier = NewCourrier::create([
            'reference' => $validatedData['reference'],
            'date' => $validatedData['date'],
            'envoye_depuis' => $validatedData['envoye_depuis'],
            'objet' => $validatedData['objet'],
            'message' => $validatedData['message'],
        ]);

        // Add EnvoyeA entries with the same new_courrier_id
        foreach ($validatedData['envoye_a'] as $envoye_a) {
            EnvoyeA::create([
                'new_courrier_id' => $newCourrier->id,
                'envoye_a' => $envoye_a,
            ]);
        }

        // Handle file uploads if needed
        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $path = $file->store('attachments');
                // Save file path to database or perform other actions
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Le courrier interne a été envoyé avec succès.')->withInput();
    }
}

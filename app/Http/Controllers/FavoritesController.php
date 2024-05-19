<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courrier;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    public function index()
    {
        // Récupérer les courriers favoris
        $favorites = Favorite::with('courrier')->get();
        return view('favorites', compact('favorites'));
    }

    public function add(Request $request)
    {
        // Ajouter un courrier aux favoris
        $favorite = new Favorite();
        $favorite->courrier_id = $request->courrier_id;
        $favorite->save();

        return redirect()->route('favorites.index')->with('success', 'Courrier ajouté aux favoris');
    }

    public function remove($id)
    {
        // Retirer un courrier des favoris
        $favorite = Favorite::find($id);
        $favorite->delete();

        return redirect()->route('favorites.index')->with('success', 'Courrier retiré des favoris');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\NewCourrierexterne;
use Illuminate\Http\Request;

class approbationController extends Controller
{
    public function index1(Request $request)
    {
        $listCourriers = NewCourrierexterne::all();

        if ($request->ajax()) {
            return response()->json($listCourriers);
        }

        return view('approbation', compact('listCourriers'));
    }
}



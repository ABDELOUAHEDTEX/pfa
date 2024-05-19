<?php

namespace App\Http\Controllers;

use App\Models\NewCourrier;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\NewCourrier;
use Illuminate\Http\Request;

class Displaycourrier extends Controller
{
    public function index(Request $request)
    {
        $courriers = NewCourrier::all();

        if ($request->ajax()) {
            return response()->json($courriers);
        }

        return view('inbox', ['courriers' => $courriers]);
    }
}
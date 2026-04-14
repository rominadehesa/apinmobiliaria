<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PublicController extends Controller {
    
    public function index() {
        $propiedades = Propiedad::all();
        return view('home', compact('propiedades'));
    }

    public function allPropiedades() {
        $propiedades = Propiedad::all();
        return view('propiedades', compact('propiedades')); 

    }

    public function showPropiedad($id) {
        $propiedad = Propiedad::findOrFail($id);
        return view('propiedad', compact('propiedad'));
    }
}

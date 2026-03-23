<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use App\Models\TipoPropiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller {
    
    public function index() {
        $propiedades = Propiedad::all();
        return view('dashboard.propiedades.index')->with('propiedades', $propiedades);
    }

    public function showTypes(){
        $tipos = TipoPropiedad::all();
        return view('dashboard.tipos.index')->with('tipos', $tipos);
    }

    public function saveType(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipo = new TipoPropiedad();
        $tipo->nombre = $request->input('nombre');
        $tipo->save();

        return redirect()->route('dashboard.tipos')->with('success', 'Tipo de propiedad guardado exitosamente.');
    }

    public function updateType(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipo = TipoPropiedad::findOrFail($id);
        $tipo->nombre = $request->input('nombre');
        $tipo->save();

        return redirect()->route('dashboard.tipos')->with('success', 'Tipo de propiedad actualizado exitosamente.');
    }

    public function destroyType($id){
        $tipo = TipoPropiedad::findOrFail($id);
        $tipo->delete();

        return redirect()->route('dashboard.tipos')->with('success', 'Tipo de propiedad eliminado exitosamente.');
    }
}

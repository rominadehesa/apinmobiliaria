<?php

namespace App\Http\Controllers;

use App\Models\Operacion;
use App\Models\Propiedad;
use App\Models\TipoPropiedad;
use Illuminate\Http\Request;
use App\Models\PropiedadImagen;
use Illuminate\Support\Facades\Storage;

class PropiedadController extends Controller {
    
    public function index() {
        $propiedades = Propiedad::all();
        return view('dashboard.propiedades.index')->with('propiedades', $propiedades);
    }

    public function create() {
        $tipos = TipoPropiedad::all();
        $operaciones = Operacion::all();
        return view('dashboard.propiedades.create')->with('tipos', $tipos)->with('operaciones', $operaciones);
    }

    public function store(Request $request) {
        
        $propiedad = new Propiedad();
        $propiedad->titulo = $request->input('titulo');
        $propiedad->descripcion = $request->input('descripcion');
        $propiedad->precio = $request->input('precio');
        $propiedad->habitaciones = $request->input('habitaciones');
        $propiedad->banios = $request->input('banios');
        $propiedad->superficie_total = $request->input('superficie_total');
        $propiedad->superficie_cubierta = $request->input('superficie_cubierta');
        $propiedad->direccion = $request->input('direccion');
        $propiedad->ciudad = $request->input('ciudad');
        $propiedad->barrio = $request->input('barrio');
        $propiedad->tiene_jardin = $request->has('tiene_jardin');
        $propiedad->tiene_cochera = $request->has('tiene_cochera');
        $propiedad->servicios = $request->input('servicios');
        $propiedad->observaciones = $request->input('observaciones');
        $propiedad->destacada = $request->has('destacada');
        $propiedad->estado = $request->input('estado');
        $propiedad->operacion_id = $request->input('operacion_id');
        $propiedad->tipo_propiedad_id = $request->input('tipo_propiedad_id');
        $propiedad->save();

        return redirect()->route('dashboard.propiedades')->with('success', 'Propiedad creada exitosamente.');

    }

    public function edit($id) {
        $propiedad = Propiedad::findOrFail($id);
        $tipos = TipoPropiedad::all();
        $operaciones = Operacion::all();
        return view('dashboard.propiedades.update')->with('propiedad', $propiedad)->with('tipos', $tipos)->with('operaciones', $operaciones);
    }

    public function update(Request $request, $id) {
        $propiedad = Propiedad::findOrFail($id);
        $propiedad->titulo = $request->input('titulo');
        $propiedad->descripcion = $request->input('descripcion');
        $propiedad->precio = $request->input('precio');
        $propiedad->habitaciones = $request->input('habitaciones');
        $propiedad->banios = $request->input('banios');
        $propiedad->superficie_total = $request->input('superficie_total');
        $propiedad->superficie_cubierta = $request->input('superficie_cubierta');
        $propiedad->direccion = $request->input('direccion');
        $propiedad->ciudad = $request->input('ciudad');
        $propiedad->barrio = $request->input('barrio');
        $propiedad->tiene_jardin = $request->has('tiene_jardin');
        $propiedad->tiene_cochera = $request->has('tiene_cochera');
        $propiedad->servicios = $request->input('servicios');
        $propiedad->observaciones = $request->input('observaciones');
        $propiedad->destacada = $request->has('destacada');
        $propiedad->estado = $request->input('estado');
        $propiedad->operacion_id = $request->input('operacion_id');
        $propiedad->tipo_propiedad_id = $request->input('tipo_propiedad_id');
        $propiedad->save();

        return redirect()->route('dashboard.propiedades')->with('success', 'Propiedad actualizada exitosamente.');
    }

    public function destroy($id) {
        $propiedad = Propiedad::findOrFail($id);
        $propiedad->delete();

        return redirect()->route('dashboard.propiedades')->with('success', 'Propiedad eliminada exitosamente.');
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

    public function createImage($id) {
        $propiedad = Propiedad::findOrFail($id);
       return view('dashboard.propiedades.addImage')->with('propiedad', $propiedad);
    }

    public function storeImage(Request $request, $id){
        
        foreach ($request->file('imagenes', []) as $imagen) {

            $ruta = $imagen->store('propiedades', 'public');

            PropiedadImagen::create([
                'propiedad_id' => $id,
                'ruta' => $ruta
            ]);
        }

        return back();
    }


    public function destroyImage(PropiedadImagen $imagen)
    {
        // eliminar archivo físico
        if (Storage::disk('public')->exists($imagen->ruta)) {
            Storage::disk('public')->delete($imagen->ruta);
        }

        $imagen->delete();

        return back()->with('success', 'Imagen eliminada');
    }
}

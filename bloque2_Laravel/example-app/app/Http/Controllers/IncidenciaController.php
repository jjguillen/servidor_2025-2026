<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{

    public function index() {
        $incidencias = Incidencia::paginate(6); //Collection de Incidencia
        return view('incidencias.index', ['incidencias' => $incidencias]);
    }

    public function delete($id) {
        Incidencia::destroy($id);
        return redirect()->route('incidencias.index');
    }

    public function store(Request $request) {
        /*
        $incidencia = new Incidencia();
        $incidencia->latitud = $request->latitud;
        $incidencia->longitud = $request->longitud;
        $incidencia->ciudad = $request->ciudad;
        $incidencia->direccion = $request->direccion;
        $incidencia->descripcion = $request->descripcion;
        $incidencia->estado = "pendiente";
        $incidencia->save();
        */

        $incidencia = Incidencia::create($request->all());

        //Poner luego ver incidencia en detalle
        return redirect()->route('incidencias.show', ['id' => $incidencia->id]);
    }

    public function show($id) {
        $incidencia = Incidencia::findOrFail($id);
        return view('incidencias.show', ['incidencia' => $incidencia]);


    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{

    public function index() {
        $incidencias = Incidencia::paginate(6); //Collection de Incidencia
        $tecnicos = Tecnico::where('estado', 'libre')->get();
        return view('incidencias.index', ['incidencias' => $incidencias, 'tecnicos' => $tecnicos]);
    }

    public function delete($id) {
        Incidencia::destroy($id);
        return redirect()->route('incidencias.index');
    }

    public function store(Request $request) {
        //Si no hay ningún técnico libre, redirigimos al index


        $incidencia = new Incidencia();
        $incidencia->latitud = $request->latitud;
        $incidencia->longitud = $request->longitud;
        $incidencia->ciudad = $request->ciudad;
        $incidencia->direccion = $request->direccion;
        $incidencia->descripcion = $request->descripcion;
        $incidencia->estado = "pendiente";
        $incidencia->tecnico_id = $request->tecnico_id;
        $incidencia->save();


        //Creamos la incidencia, nos da el id creado
        //var_dump($request->all());
        //$incidencia = Incidencia::create($request->all());

        //Poner el técnico correspondiente a la incidencia como 'ocupado'
        $tecnico = Tecnico::find($request->tecnico_id);
        $tecnico->estado = 'ocupado';
        $tecnico->save();

        //Almacenamos la imagen con el id de la incidencia y nos devuelve la ruta completa
        if ($request->hasFile('imagen')) {
            $path = $request->imagen->storeAs('incidencias', 'incidencia_' . $incidencia->id . '.jpg');

            //Actualizamos la incidencia con el path que me ha generado la imagen
            $incidencia->imagen = $path;
            $incidencia->save();
        }

        //Poner luego ver incidencia en detalle
        return redirect()->route('incidencias.show', ['id' => $incidencia->id]);
    }

    public function show($id) {
        $incidencia = Incidencia::findOrFail($id);
        $tecnico = $incidencia->tecnico; //Obtengo el tecnico asignado a la incidencia
        return view('incidencias.show', ['incidencia' => $incidencia, 'tecnico' => $tecnico]);


    }

}

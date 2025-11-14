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

}

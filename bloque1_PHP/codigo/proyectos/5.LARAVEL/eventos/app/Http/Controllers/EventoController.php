<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventoCollection;
use App\Http\Resources\EventoResource;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        if (Cache::has('eventos')) {
            return view('admin.eventos', [ 'eventos' => cache('eventos') ]);
        } else {
            $eventos = Evento::all();
            cache()->put('eventos', $eventos);
            return view('admin.eventos', [ 'eventos' => cache('eventos') ]);
        }
        */
        return view('admin.eventos', ['eventos' => Evento::all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.evento_form', ['categorias' => Categoria::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date|after:today',
            'hora' => 'required|date_format:H:i:s',
            'aforo_maximo' => 'required|integer|min:10|max:10000',

        ]);

        if ($request->hasFile('url_imagen')) {
            // Crear un nuevo evento usando $request->all()
            $evento = Evento::create($request->all());
            $path = $request->file('url_imagen')->store('images_eventos');
            $evento->url_imagen = $path;
            $evento->save();
        } else {
            $evento = new Evento();
            $evento->nombre = $request->nombre;
            $evento->descripcion = $request->descripcion;
            $evento->fecha = $request->fecha;
            $evento->hora = $request->hora;
            $evento->ciudad = $request->ciudad;
            $evento->direccion = $request->direccion;
            $evento->url_imagen = "";
            $evento->aforo_maximo = $request->aforo_maximo;
            $evento->categoria_id = $request->categoria_id;
            $evento->save();
        }

        //Cachear los eventos cuando se crea uno nuevo
        //$eventos = Evento::all();
        //cache()->put('eventos', $eventos);


        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {

        Log::info('Showing the event : {id}', ['id' => $evento->id]);
        return view('admin.evento_detalle', ['evento' => $evento]);
    }

    public function ver($id) {
        return Evento::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('admin.evento_form', ['evento' => $evento, 'categorias' => Categoria::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        $old_filename = $evento->url_imagen;

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date|after:today',
            'hora' => 'required|date_format:H:i:s',
            'aforo_maximo' => 'required|integer|min:10|max:10000',
        ]);

        $evento->update($request->all());

        //Vuelve a modificar el evento si lleva una imagen en el formulario
        if ($request->hasFile('url_imagen')) {
            //Borrar imagen anterior
            Storage::delete($old_filename);
            //Guardar la nueva imagen
            $path = $request->file('url_imagen')->store('images_eventos');
            $evento->url_imagen = $path;
            //Modificar el evento
            $evento->save();
        }

        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        Evento::destroy($evento->id);
        return "Evento eliminado";
    }

    public function delete(Evento $evento)
    {
        Evento::destroy($evento->id);
        return redirect()->route('eventos.index');;
    }

    public function inscritos(Evento $evento)
    {
        $inscritos = $evento->inscritos;
        return view('admin.inscritos', ['inscritos' => $inscritos, 'evento' => $evento]);
    }

    public function users_insc(Evento $evento)
    {
        //Pintamos solo los usuarios no inscritos en el evento
        $users = User::all();
        $users_inscritos = $evento->inscritos;
        $users = $users->diff($users_inscritos);

        return view('admin.users_insc', ['evento' => $evento, 'usuarios' => $users]);
    }

    public function inscribir(Evento $evento, User $usuario)
    {
        //Comprobar que no se inscribe un usuario ya inscrito
        $users_inscritos = $evento->inscritos;
        if ($users_inscritos->contains($usuario)) {
            return redirect()->route('eventos.inscritos', ['evento' => $evento]);
        }
        $evento->inscritos()->attach($usuario->id);
        return redirect()->route('eventos.inscritos', ['evento' => $evento]);
    }

    public function desinscribir(Evento $evento, User $usuario)
    {
        $evento->inscritos()->detach($usuario->id);
        return redirect()->route('eventos.inscritos', ['evento' => $evento]);
    }



    ///// API METHODS ////////////////////////////////////////////////////////////////

    public function api_index()
    {
        return new EventoCollection(Evento::paginate(3));
    }

    public function api_show(Evento $evento)
    {
        Log::info('API: Showing the event : {id}', ['id' => $evento->id]);
        return new EventoResource($evento);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.usuarios', [ 'usuarios' => User::all() ]);
    }

    public function show($id)
    {
        return "Id: ".$id. " - admin";
    }

    public function consulta() {
        //return User::all();
        //return DB::table('users')->get(); //Usando BBDD

        //return User::find(2); //Select * from users where id = 2
        //return User::where('rol', 'admin')->get(); //Select * from users where rol = 'admin'

        //return User::where('rol', 'user')
        //    ->orderBy('email', 'desc')
        //    ->get();

        //$user->refresh(); //Vuelve a cargar los datos de la BBDD

        // $usersLazy = Evento::lazy(25); //Lazy loading de 25 en 25
        //foreach($usersLazy as $user) {
        //    echo $user->nombre . "<br>";
        //}

        //$count = Evento::all()->count();
        //$count = DB::table('eventos')->count();
        //echo $count;

        $user = User::find(3);
        $eventos = $user->eventos;
        return $eventos;


    }


}

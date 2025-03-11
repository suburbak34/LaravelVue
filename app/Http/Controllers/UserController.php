<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function funListar()
    {
       // $usuarios = DB::select('SELECT * FROM users');
       //$usuarios = DB::table('users')->select("name")->get();
        $usuarios = User::get(); 
        return $usuarios;
    }

    public function funGuardar(Request $request)
    {
        $nombre = $request->name;
        $correo = $request->email;
        $password = $request->password;

        $usuario = new User();
        $usuario->name = $nombre;
        $usuario->email = $correo;
        $usuario->password = $password;
        $usuario->save();       
        return ["mensaje" => "Usuario guardado"];
         
    }

    public function funMostrar($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario, 200);
    }
    
    public function funModificar(Request $request, $id)
    {
        $nombre = $request->name;
        $correo = $request->email;
        $password = $request->password;

        $usuario = User::findOrFail($id);
        $usuario->name = $nombre;
        $usuario->email = $correo;
        $usuario->password = $password;
        $usuario->save();       
        return response()->json(["mensaje" => "Usuario modificado"], 201); ;
    }

    public function funEliminar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return response()->json(["mensaje" => "Usuario eliminado"], 200);
    }
     
}

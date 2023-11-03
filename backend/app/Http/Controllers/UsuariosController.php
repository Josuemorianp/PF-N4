<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = usuarios::all();
        return $usuarios;
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required',
            'usuario' => 'required',
            'clave' => 'required',
            'fecha' => 'required',
            'id_rol' => 'required',
            'habilitado' => 'required',
        ]);

        $usuarios = new usuarios();
        $usuarios->id_persona = $request->input('id_persona');
        $usuarios->usuario = $request->input('usuario');
        $usuarios->clave = $request->input('clave');
        $usuarios->fecha = $request->input('fecha');
        $usuarios->id_rol = $request->input('id_rol');
        $usuarios->habilitado = $request->input('habilitado');
        
        $usuarios->save();
        return response()->json(["Se agrego correctamente el Usuario"], 200); 
    }

    public function show($id)
    {
        $usuarios = usuarios::find($id);
        if(!$usuarios){
            return response()->json(["message"=> "Usuario no encontrado"],404);
        }

        return response()->json($usuarios);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_persona' => 'required',
            'usuario' => 'required',
            'clave' => 'required',
            'fecha' => 'required',
            'id_rol' => 'required',
            'habilitado' => 'required',
        ]);

        $usuarios = usuarios::find($id);
        if(!$usuarios){
            return response()->json(["message"=> "Usuario no encontrado"],404);
        }

        $usuarios->id_persona= $request->input('id_persona');
        $usuarios->usuario= $request->input('usuario');
        $usuarios->clave= $request->input('clave');
        $usuarios->fecha = $request->input('fecha');
        $usuarios->id_rol = $request->input('id_rol');
        $usuarios->habilitado = $request->input('habilitado');
        $usuarios->save();
        return response()->json($usuarios, 200);
    }

    public function destroy($id)
    {
        $usuarios = usuarios::find($id);
        if(!$usuarios){
            return response()->json(["message"=> "Usuario no encontrado"],404);
        }
        $usuarios->delete($id);
        return response()->json(["message" => "Usuario eliminado"], 200);
    }
}

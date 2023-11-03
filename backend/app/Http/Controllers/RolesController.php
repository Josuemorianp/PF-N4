<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return $roles;
    }
    public function store(Request $request)
    {
        $request->validate([
            'rol' => 'required',
            'fecha_creacion' => 'required',
            'fecha_modificacion' => 'required',
            'usuario_creacion' => 'required',
            'usuario_modificacion' => 'required',
        ]);

        $roles = new roles();
        $roles->rol= $request->input('rol');
        $roles->fecha_creacion= $request->input('fecha_creacion');
        $roles->fecha_modificacion= $request->input('fecha_modificacion');
        $roles->usuario_creacion= $request->input('usuario_creacion');
        $roles->usuario_modificacion= $request->input('usuario_modificacion');

        $roles->save();
        return response()->json(["Se agrego correctamente el rol"], 200); 
    }

    public function show($id)
    {
        $roles = Roles::find($id);
        if(!$roles){
            return response()->json(["message"=> "Rol no autorizado"],404);
        }

        return response()->json($roles, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rol' => 'required',
            'fecha_creacion' => 'required',
            'fecha_modificacion' => 'required',
            'usuario_creacion' => 'required',
            'usuario_modificacio' => 'required',
        ]);
        $roles = Roles::find($id);
        if(!$roles){
            return response()->json(["message"=> "Rol no entrado"],404);
        }

        $roles->rol= $request->input('rol');
        $roles->save();
        return response()->json($roles, 200);

    }

    public function destroy($id)
    {
        $roles = Roles::find($id);
        if(!$roles){
            return response()->json(["message"=> "Rol no encontrado"],404);
        }
        $roles->delete($id);
        return response()->json(["message" => "Rol eliminado"], 200);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\paginas;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function index()
    {
        $paginas = paginas::all();
        return $paginas;
    }
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'estado' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'icono' => 'required',
            'tipo' => 'required',
            'habilidato' => 'required',
        ]);

        $paginas = new paginas();
        $paginas->url = $request->input('url');
        $paginas->estado = $request->input('estado');
        $paginas->nombre = $request->input('nombre');
        $paginas->descripcion = $request->input('descripcion');
        $paginas->icono = $request->input('icono');
        $paginas->tipo = $request->input('tipo');
        $paginas->habilitado = $request->input('habilitado');

        $paginas->save();
        return response()->json(["Se agrego correctamente la página"], 200); 
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

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
        $paginas = paginas::find($id);
        if(!$paginas){
            return response()->json(["message"=> "Página no encontrada"],404);
        }

        return response()->json($paginas, 200);
    }

    public function update(Request $request, $id)
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
        $paginas = paginas::find($id);
        if(!$paginas){
            return response()->json(["message"=> "Página no encontrada"],404);
        }

        $paginas->url= $request->input('url');
        $paginas->estado= $request->input('estado');
        $paginas->nombre= $request->input('nombre');
        $paginas->descripcion= $request->input('descripcion');
        $paginas->icono= $request->input('icono');
        $paginas->tipo= $request->input('tipo');
        $paginas->habilitado= $request->input('habilitado');
        $paginas->save();
        return response()->json($paginas, 200);

    }

    public function destroy($id)
    {
        $paginas = paginas::find($id);
        if(!$paginas){
            return response()->json(["message"=> "Página no encontrada"],404);
        }
        $paginas->delete($id);
        return response()->json(["message" => "Página eliminada"], 200);
    }
}

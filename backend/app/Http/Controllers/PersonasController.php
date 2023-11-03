<?php

namespace App\Http\Controllers;

use App\Models\personas;
use Exception;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index()
    {
        $personas = Personas::all();
        return $personas;
    }
    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
        ]);

        $personas = new personas();
        $personas->primer_nombre= $request->input('primer_nombre');
        $personas->segundo_nombre= $request->input('segundo_nombre');
        $personas->primer_apellido= $request->input('primer_apellido');
        $personas->segundo_apellido= $request->input('segundo_apellido');

        $personas->save();
        return response()->json(["message"=> "Se agrego correctamente la persona"], 200); 
    }

    public function show($id)
    {
        $personas = Personas::find($id);
        if(!$personas){
            return response()->json(["message"=> "Persona no encontrada"],404);
        }
        return response()->json($personas);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'fecha_creacion' => 'required',
            'fecha_modificacion' => 'required',
            'usuario_creacion' => 'required',
            'usuario_modificacio' => 'required',
        ]);
        $personas = Personas::find($id);
        if(!$personas){
            return response()->json(["message"=> "Persona no entrada"],404);
        }
        $personas->primer_nombre= $request->input('primer_nombre');
        $personas->segundo_nombre= $request->input('segundo_nombre');
        $personas->primer_apellido= $request->input('primer_apellido');
        $personas->segundo_apellido= $request->input('segundo_apellido');
        $personas->save();
        return response()->json(["message" => "Se ha actualizado la persona"], 200);

    }

    public function destroy($id)
    {
        $personas = Personas::find($id);
        if(!$personas){
            return response()->json(["message"=> "Persona no encontrada"],404);
        }
        $personas->delete($id);
        return response()->json(["message" => "Persona eliminada"], 200);
    }
}

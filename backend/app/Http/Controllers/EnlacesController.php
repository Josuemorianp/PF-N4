<?php

namespace App\Http\Controllers;

use App\Models\enlaces;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    public function index()
    {
        $enlaces = enlaces::all();
        return $enlaces;
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_pagina' => 'required',
            'id_rol' => 'required',
            'descripcion' => 'required',
        ]);

        $enlaces = new enlaces();
        $enlaces->id_pagina = $request->input('id_pagina');
        $enlaces->id_rol = $request->input('id_rol');
        $enlaces->descripcion = $request->input('descripcion');
        
        $enlaces->save();
        return response()->json(["Se agrego correctamente el Enlace"], 200); 
    }

    public function show($id)
    {
        $enlaces = enlaces::find($id);
        if(!$enlaces){
            return response()->json(["message"=> "Enlace no encontrado"],404);
        }

        return response()->json($enlaces);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pagina' => 'required',
            'id_rol' => 'required',
            'descripcion' => 'required',
        ]);

        $enlaces = enlaces::find($id);
        if(!$enlaces){
            return response()->json(["message"=> "Enlace no encontrado"],404);
        }

        $enlaces->id_pagina= $request->input('id_pagina');
        $enlaces->id_rol= $request->input('id_rol');
        $enlaces->descripcion= $request->input('descripcion');
        $enlaces->save();
        return response()->json($enlaces, 200);

    }

    public function destroy($id)
    {
        $enlaces = enlaces::find($id);
        if(!$enlaces){
            return response()->json(["message"=> "Enlace no encontrado"],404);
        }
        $enlaces->delete($id);
        return response()->json(["message" => "Enlace eliminado"], 200);
    }
}

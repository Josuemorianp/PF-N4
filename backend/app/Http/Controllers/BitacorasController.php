<?php

namespace App\Http\Controllers;

use App\Models\bitacoras;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    public function index()
    {
        $bitacoras = bitacoras::all();
        return $bitacoras;
    }
    public function store(Request $request)
    {
        $request->validate([
            'bitacora' => 'required',
            'id_usuario' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'ip' => 'required',
            'so' => 'required',
            'navegador' => 'required',
        ]);

        $bitacoras = new bitacoras();
        $bitacoras->bitacora = $request->input('bitacora');
        $bitacoras->id_usuario = $request->input('id_usuario');
        $bitacoras->fecha = $request->input('fecha');
        $bitacoras->hora = $request->input('hora');
        $bitacoras->ip = $request->input('ip');
        $bitacoras->so = $request->input('so');
        $bitacoras->navegador = $request->input('navegador');
        
        $bitacoras->save();
        return response()->json(["Se agrego correctamente la Bitacora"], 200); 
    }

    public function show($id)
    {
        $bitacoras = bitacoras::find($id);
        if(!$bitacoras){
            return response()->json(["message"=> "Bitacora no encontrada"],404);
        }

        return response()->json($bitacoras);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bitacora' => 'required',
            'id_usuario' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'ip' => 'required',
            'so' => 'required',
            'navegador' => 'required',
        ]);

        $bitacoras = bitacoras::find($id);
        if(!$bitacoras){
            return response()->json(["message"=> "Bitacora no encontrada"],404);
        }

        $bitacoras->bitacora= $request->input('bitacora');
        $bitacoras->id_usuario= $request->input('id_usuario');
        $bitacoras->fecha= $request->input('fecha');
        $bitacoras->hora = $request->input('hora');
        $bitacoras->ip = $request->input('ip');
        $bitacoras->so = $request->input('so');
        $bitacoras->navegador = $request->input('navegador');

        $bitacoras->save();
        return response()->json(["message" => "Bitacora actualizada"], 200);

    }

    public function destroy($id)
    {
        $bitacoras = bitacoras::find($id);
        if(!$bitacoras){
            return response()->json(["message"=> "Bitacora no encontrada"],404);
        }
        $bitacoras->delete($id);
        return response()->json(["message" => "Bitacora eliminada"], 200);
    }
}

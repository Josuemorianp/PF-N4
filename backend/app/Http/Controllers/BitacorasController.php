<?php

namespace App\Http\Controllers;

use App\Models\bitacoras;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    public function index()
    {
        // $Bitacora = Bitacora::where('habilitado', 1)->get();
        $Bitacora = bitacoras::all();
        return $Bitacora;
    }
    public function getById($id)
    {
        if (bitacoras::find($id) == null) {
            return "No se encuentra registros de la Bitacora con el id N° " . $id;
        }
        
        $Bitacora = bitacoras::find($id);
        return $Bitacora;
    }
}

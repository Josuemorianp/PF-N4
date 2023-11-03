<?php

namespace App\Http\Controllers;

use App\Models\enlaces;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    public function index()
    {
        // $Enlace = Enlace::where('habilitado', 1)->get();
        $Enlace = enlaces::all();
        return $Enlace;
    }
    public function getById($id)
    {
        if (enlaces::find($id) == null) {
            return "No existe el Enlace con el id N° " . $id;
        }
        
        $Enlace = enlaces::find($id);
        return $Enlace;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empanada;

class EmpanadaController extends Controller
{
    //



    public function List(Request $request){

        $empanada = Empanada::all();
        return $empanada;
        

    }


    public function Find(Request $request, $idEmpanada){


        return $empanada = Empanada::FindOrFail($idEmpanada);
    }

    public function Delete(Request $request, $idEmpanada){

        $empanada = Empanada::FindOrFail($idEmpanada);
        $empanada->delete();
        return ['Message' => 'Deleted'];
    }


    public function Create(Request $request){
        $empanada = new Empanada();
        $empanada -> nombre = $request ->post("nombre");
        $empanada -> tipo = $request ->post("tipo");
        $empanada -> precio = $request ->post("precio");
        $empanada -> cantidad = $request ->post("cantidad");
        $empanada->save();

        return $empanada;
        
    }

    public function Update(Request $request, $idEmpanada){

        $empanada = Empanada::FindOrFail($idEmpanada);
        $empanada -> nombre = $request ->post("nombre");
        $empanada -> tipo = $request ->post("tipo");
        $empanada -> precio = $request ->post("precio");
        $empanada -> cantidad = $request ->post("cantidad");
        $empanada->save();

        return $empanada;
    }
}

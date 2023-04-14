<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function index(){
        $indicadores = Indicador::select('nombreIndicador')->distinct()->get();
        return view('grafico.index')->with(['indicadores'=>$indicadores]);
    }
    public function genGraph(Request $request){
        $request->validate([
            'fechaInicio' => 'required',
            'fechaTermino' => 'required|after:fechaInicio',
            'nombreIndicador' => 'required'
        ]);
        $fechaInicio = $request->fechaInicio;
        $fechaTermino = $request->fechaTermino;
        $nombreIndicador = $request->nombreIndicador;
        $indicadores = Indicador::select('nombreIndicador')->distinct()->get();
        return view('grafico.index')->with(['fechaInicio'=>$fechaInicio,'fechaTermino'=>$fechaTermino,'nombreIndicador'=>$nombreIndicador, 'indicadores'=>$indicadores]);
    }
}

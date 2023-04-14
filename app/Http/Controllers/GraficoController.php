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
        $query = Indicador::select('valorIndicador', 'fechaIndicador')->where('nombreIndicador','=',$nombreIndicador)->whereBetween('fechaIndicador', [$fechaInicio, $fechaTermino])->get();
        $fechas = [];
        $data = [];
        foreach ($query as $q){
            array_push($fechas, $q->fechaIndicador);
            array_push($data, $q->valorIndicador);
        }
        $indicadores = Indicador::select('nombreIndicador')->distinct()->get();
        return view('grafico.show')->with(['fechas'=>$fechas, 'data'=>$data, 'indicadores'=>$indicadores, 'nombreIndicador'=>$nombreIndicador, 'fechaInicio'=>$fechaInicio, 'fechaTermino'=>$fechaTermino]);
    }
}

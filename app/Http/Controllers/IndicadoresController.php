<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use Illuminate\Http\Request;

class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indicadores = Indicador::paginate(30);
        return view('indicador.index')->with(['indicadores'=>$indicadores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreIndicador'=>'required',
            'codigoIndicador'=>'required',
            'unidadMedidaIndicador'=>'required',
            'valorIndicador'=>'required|numeric',
            'fechaIndicador'=>'required'
        ]);

        $indicador = new Indicador();
        $indicador->nombreIndicador = $request->nombreIndicador;
        $indicador->codigoIndicador = $request->codigoIndicador;
        $indicador->unidadMedidaIndicador = $request->unidadMedidaIndicador;
        $indicador->valorIndicador = $request->valorIndicador;
        $indicador->fechaIndicador = $request->fechaIndicador;
        $indicador->tiempoIndicador = null;
        $indicador->origenIndicador = 'local';
        $indicador->save();

        return redirect()->route('indicador.index')->with('success', 'Indicador creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $indicador = Indicador::find($id);
        return view('indicador.show')->with(['indicador'=>$indicador]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $indicador = Indicador::find($id);
        $request->validate([
            'nombreIndicador'=>'required',
            'codigoIndicador'=>'required',
            'unidadMedidaIndicador'=>'required',
            'valorIndicador'=>'required|numeric',
            'fechaIndicador'=>'required'
        ]);
        $indicador->nombreIndicador = $request->nombreIndicador;
        $indicador->codigoIndicador = $request->codigoIndicador;
        $indicador->unidadMedidaIndicador = $request->unidadMedidaIndicador;
        $indicador->valorIndicador = $request->valorIndicador;
        $indicador->fechaIndicador = $request->fechaIndicador;
        $indicador->tiempoIndicador = null;
        $indicador->origenIndicador = 'local';
        $indicador->save();

        return redirect()->route('indicador.index')->with('success', 'Indicador actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Indicador::find($id)->delete();
        
        return redirect()->route('indicador.index')->with('success', '
        Indicador eliminado correctamente');
    }
}

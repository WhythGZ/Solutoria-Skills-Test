<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}


// <?php

// namespace App\Http\Controllers;

// use App\Models\Indicador;
// use Illuminate\Http\Request;

// class IndicadoresController extends Controller
// {
    
//     public function crear(Request $request)
//     {
//         $indicador = new Indicador();
//         $indicador->nombreIndicador = $request->nombreIndicador;
//         $indicador->codigoIndicador = $request->codigoIndicador;
//         $indicador->unidadIndicador = $request->unidadIndicador;
//         $indicador->valorIndicador = $request->valorIndicador;
//         $indicador->fechaIndicador = $request->fechaIndicador;
//         $indicador->tiempoIndicador = null;
//         $indicador->origenIndicador = "Solutoria-TS";
//         $indicador->save();

//         return response()->json([
//             'success' => true,
//             'mensaje' => 'Indicador creado correctamente'
//         ]);
//     }

//     public function obtener(string $id)
//     {
//         $indicador = Indicador::find($id);

//         return response()->json([
//             'success' => true,
//             'indicador' => $indicador 
//         ]);
//     }

//     public function actualizar(string $id, Request $request)
//     {
//         $indicador = Indicador::find($id);
//         $indicador->nombreIndicador = $request->nombreIndicador;
//         $indicador->codigoIndicador = $request->codigoIndicador;
//         $indicador->unidadIndicador = $request->unidadIndicador;
//         $indicador->valorIndicador = $request->valorIndicador;
//         $indicador->fechaIndicador = $request->fechaIndicador;
//         $indicador->save();

//         return response()->json([
//             'success' => true,
//             'mensaje' => 'Indicador actualizado correctamente'
//         ]);
//     }

//     public function eliminar(string $id)
//     {
//         $indicador = Indicador::find($id)->delete();

//         return response()->json([
//             'success' => true,
//             'mensaje' => 'Indicador eliminado correctamente'
//         ]);
//     }

// }

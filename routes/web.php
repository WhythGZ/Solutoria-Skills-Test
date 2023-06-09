<?php

use App\Http\Controllers\GraficoController;
use App\Http\Controllers\IndicadoresController;
use App\Models\Indicador;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('indicador');
});

Route::resource('indicador', IndicadoresController::class);

Route::get('grafico', [GraficoController::class, 'index'])->name('grafico');
Route::post('grafico', [GraficoController::class, 'genGraph'])->name('grafico');
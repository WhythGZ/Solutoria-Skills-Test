@extends('Indicadores.base')
@section('content')
<div class="card m-3">
    <div class="card-header">
        <h6 class="fst-italic fw-normal text-center">Mantenedor Indicadores<h6>
    </div>
    <div class="card-body">
        <div class="container">
            <h4 class="text-center">Formulario</h4>
            <form action="{{route('indicador')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="nombreIndicador">Nombre</label>
                        <input required type="text" name="nombreIndicador" class="form-control" id="nombreIndicador">
                    </div>
                    <div class="col-6">
                        <label for="codigoIndicador">Codigo</label>
                        <input required type="text" name="codigoIndicador" class="form-control" id="codigoIndicador">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="unidadMedidaIndicador">Unidad de Medida</label>
                        <input required type="text" name="unidadMedidaIndicador" class="form-control" id="unidadMedidaIndicador">
                    </div>
                    <div class="col-6">
                        <label for="valorIndicador">Valor</label>
                        <input required type="number" name="valorIndicador" class="form-control" id="valorIndicador">
                    </div>
                </div>
                <div class="col-12">
                    <label for="fechaIndicador">Fecha</label>
                    <input required type="date" class="form-control" id="fechaIndicador" name="fechaIndicador" id="fechaIndicador">
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-success">Crear nuevo Indicador</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">

    </div>
  </div>

@endsection
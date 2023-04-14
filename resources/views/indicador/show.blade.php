@extends('base')
@section('content')
<div class="card m-3">
    <div class="card-header">
        <h6 class="fst-italic fw-normal text-center">Mantenedor Indicadores<h6>
    </div>
    <div class="card-body">
        <div class="container">
            <h4 class="text-center">Formulario</h4>
            <form action="{{route('indicador.update', ['indicador'=>$indicador->id])}}" method="POST">
                @csrf
                @method('PATCH')
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif
                @error('fechaIndicador')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('nombreIndicador')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('codigoIndicador')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('unidadMedidaIndicador')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('valorIndicador')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="col-12 mt-2">
                    <label for="fechaIndicador">Fecha</label>
                    <input required type="date" class="form-control" id="fechaIndicador" name="fechaIndicador" id="fechaIndicador" value="{{$indicador->fechaIndicador}}">
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="nombreIndicador">Nombre</label>
                        <input required type="text" name="nombreIndicador" class="form-control" id="nombreIndicador" value="{{$indicador->nombreIndicador}}">
                    </div>
                    <div class="col-6">
                        <label for="codigoIndicador">Código</label>
                        <input required type="text" name="codigoIndicador" class="form-control" id="codigoIndicador" value="{{$indicador->codigoIndicador}}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="unidadMedidaIndicador">Unidad de Medida</label>
                        <input required type="text" name="unidadMedidaIndicador" class="form-control" id="unidadMedidaIndicador" value="{{$indicador->unidadMedidaIndicador}}">
                    </div>
                    <div class="col-6">
                        <label for="valorIndicador">Valor</label>
                        <input required type="number" name="valorIndicador" class="form-control" id="valorIndicador" value="{{$indicador->valorIndicador}}">
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-success">Actualizar Indicador</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
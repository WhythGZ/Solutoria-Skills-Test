@extends('base')

@section('content')

<div class="card m-3 pb-3">
    <div class="card-header">
        <h6 class="fst-italic fw-normal text-center">Formulario de Grafico<h6>
    </div>
    <div class="card-body">
        <div class="container">
            <h4 class="text-center">Formulario para generar Grafico</h4>
            <form action="{{route('grafico')}}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif
                @error('fechaInicio')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('fechaTermino')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('nombreIndicador')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="row mt-2">
                    <div class="col-6 mt-2">
                        <label for="fechaInicio">Desde</label>
                        <input required type="date" class="form-control" id="fechaInicio" name="fechaInicio" id="fechaInicio">
                    </div>
                    <div class="col-6">
                        <label for="fechaInicio">Hasta</label>
                        <input required type="date" class="form-control" id="fechaTermino" name="fechaTermino" id="fechaTermino">
                    </div>
                </div>
                <div class="col-12">
                    <label for="nombreIndicador">Indicador</label>
                    <select required class="form-select" name="nombreIndicador" id="nombreIndicador">
                        <option selected disabled>Seleccione una opción</option>
                        @foreach ($indicadores as $indicador)
                            <option value="{{$indicador['nombreIndicador']}}">{{$indicador['nombreIndicador']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-info">Generar Grafico</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
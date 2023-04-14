@extends('base')

@section('content')

<div class="card m-3 pb-3">
    <div class="card-header">
        <h6 class="fst-italic fw-normal text-center">Formulario de Gráfico<h6>
    </div>
    <div class="card-body">
        <div class="container">
            <h4 class="text-center">Formulario para generar Gráfico</h4>
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
                        <input required type="date" class="form-control" id="fechaInicio" name="fechaInicio" id="fechaInicio" value="{{$fechaInicio}}">
                    </div>
                    <div class="col-6">
                        <label for="fechaInicio">Hasta</label>
                        <input required type="date" class="form-control" id="fechaTermino" name="fechaTermino" id="fechaTermino" value="{{$fechaTermino}}">
                    </div>
                </div>
                <div class="col-12">
                    <label for="nombreIndicador">Indicador</label>
                    <select required class="form-select" name="nombreIndicador" id="nombreIndicador">
                        <option selected disabled>Seleccione una opción</option>
                        @foreach ($indicadores as $indicador)
                            @if ($indicador['nombreIndicador'] != $nombreIndicador)
                                <option value="{{$indicador['nombreIndicador']}}">{{$indicador['nombreIndicador']}}</option>
                            @else
                                <option selected value="{{$nombreIndicador}}">{{$nombreIndicador}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-info">Actualizar Gráfico</button>
                </div>
            </form>
        </div>
    </div>
    @if (isset($data)&&(count($data)>=1))
        <div class="card-footer container">
            <div hidden id="nombreGrafico">{{$nombreIndicador}}</div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const getDataColors = opacity => {
            const colors = ['#7448c2', '#21c0d7', '#d99e2b', '#cd3a81', '#9c99cc', '#e14eca', '#ffffff', '#ff0000', '#d6ff00', '#0038ff']
            return colors.map(color => opacity ? `${color + opacity}` : color)
        }
        const ctx = document.getElementById('myChart');
        const nombreIndicador = 'VALOR ' + document.getElementById('nombreGrafico').innerHTML;
        const data = {{json_encode($data)}};
        const fechas = {!! json_encode($fechas) !!};
        new Chart(ctx, {
        type: 'line',
        data: {
            labels: fechas,
            datasets: [{
            label: nombreIndicador,
            data: data,
            borderColor: getDataColors(),
            backgroundColor: getDataColors()[6],
            borderWidth: 1
            }],
        }
        });
    </script>
    @elseif (count($data)<1)
    <div class="card-footer container">
        <h4 class="text-center fw-light fst-italic">Aun no existen registros de <span class="text-lowercase">{{$nombreIndicador}}</span> para la fecha seleccionada</h4>
    </div>
    @endif
</div>

@endsection
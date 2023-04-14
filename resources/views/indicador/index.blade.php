@extends('base')
@section('content')
<div class="card m-3 pb-3">
    <div class="card-header">
        <h6 class="fst-italic fw-normal text-center">Mantenedor Indicadores<h6>
    </div>
    <div class="card-body">
        <div class="container">
            <h4 class="text-center">Formulario</h4>
            <form action="{{route('indicador.index')}}" method="POST">
                @csrf
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
                    <input required type="date" class="form-control" id="fechaIndicador" name="fechaIndicador" id="fechaIndicador">
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="nombreIndicador">Nombre</label>
                        <input required type="text" name="nombreIndicador" class="form-control" id="nombreIndicador">
                    </div>
                    <div class="col-6">
                        <label for="codigoIndicador">Código</label>
                        <input required type="text" name="codigoIndicador" class="form-control" id="codigoIndicador">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="unidadMedidaIndicador">Unidad de Medida</label>
                        <input required type="text" name="unidadMedidaIndicador" class="form-control" id="unidadMedidaIndicador">
                    </div>
                    <div class="col-6">
                        <label for="valorIndicador">Valor</label>
                        <input required type="number" name="valorIndicador" class="form-control" id="valorIndicador">
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-success">Crear nuevo Indicador</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer container">
        <table class="table table-info table-striped caption-top" id="tablaIndicadores">
            <caption class="text-center">Lista de Indicadores</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Código</th>
                <th scope="col">Unidad de Medida</th>
                <th scope="col">Valor</th>
                <th scope="col">Fecha</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Origen</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($indicadores as $indicador)
                    <tr>
                    <th scope="row">{{$indicador->id}}</th>
                    <td>{{$indicador->nombreIndicador}}</td>
                    <td>{{$indicador->codigoIndicador}}</td>
                    <td>{{$indicador->unidadMedidaIndicador}}</td>
                    <td>{{$indicador->valorIndicador}}</td>
                    <td>{{$indicador->fechaIndicador}}</td>
                    @if ($indicador->tiempoIndicador === null)
                        <td>Sin Definir</td>
                    @else
                        <td>{{$indicador->tiempoIndicador}}</td>
                    @endif
                    <td>{{$indicador->origenIndicador}}</td>
                    <td><a href="{{route('indicador.show', ['indicador' => $indicador->id])}}" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></a></td>
                    <td><form method="POST" action="{{route('indicador.destroy', [$indicador->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg></button></form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-6 d-flex justify-content-center align-items-center">
                <span class="text-info fw-bold fs-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-braces" viewBox="0 0 16 16">
                        <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6zM13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6z"/>
                    </svg> Solutoria-ST</span>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end m-5">
                    {{$indicadores->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


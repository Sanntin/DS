@extends('layouts.app')

@section('content')
<div id="modalReporteInput" class="modal">
  <!-- Modal content -->
    <form action="/reporteDeReparaciones" method="POST">
        @csrf
        <div class="modal-content">
            <span class="close">&times;</span>

            <label for="inptFechaDesde">Fecha desde</label>
            <input type="date" name="inptFechaDesde" required>
            
            <label for="inptFechaHasta">Fecha hasta (opcional)</label>
            <input type="date" name="inptFechaHasta">

            {{-- Deberia realizar consulta a BD para obtener los estados para que sea mejor --}}
            <label for="inptEstado">Estado de reparaciones</label>
            <select name="inptEstado" required>
                <option value='' selected hidden>-</option>
                <option value='diagnostico'>Diagnóstico</option>
                <option value='en proceso'>En proceso</option>
                <option value='completado'>Completado</option>
            </select>

            <br>
            <button class="btn btn-primary btn-block text-white btn-user" type="submit">Generar Reporte</button>
        </div>
    </form> 
</div>
<h3 class="text-dark mb-4">Reparaciones</h3>
<div class="card shadow">
<div class="card-header d-flex justify-content-between align-items-center">
    <div class="row" style="width: 100%;">
        <div class="col d-xl-flex align-items-xl-center">
            <h6 class="text-primary font-weight-bold m-0">Reparaciones</h6>
        </div>
        <div class="col d-xl-flex justify-content-xl-end">
            <!-- Start: #generarReparacion --><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nueva reparación" href="/generarReparacion"><i class="fa fa-plus"></i></a>
                    <button id="btnGenerarReporte" class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;" title="Generar reporte de reparaciones"><i class="fa fa-list-alt"></i></button>
                  
            </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table class="table my-0" id="dataTable">
            <thead>
                <tr>
                    <th>Patente</th>
                    <th>Titular</th>
                    <th style="width: 180px;">Fecha ingreso</th>
                    <th>Estado</th>
                    <th style="padding-right: 0;width: 90px;">Kilometraje</th>
                    <th>Fecha salida</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reparaciones as $reparacion)
                <tr class="t-row task task-repair" data-id={{$reparacion->id}} value="{{$reparacion->estado}}">
                    <td>{{$reparacion->patente}}</td>
                    <td>{{$reparacion->cliente->apellido}} {{$reparacion->cliente->nombre}}</td>
                    <td>{{date('d/m/y', strtotime($reparacion->fechaDeEntrada))}}</td>
                    <td>{{ucfirst($reparacion->estado)}}</td>
                    <td>{{$reparacion->kilometraje}}</td>
                    <td>@isset($reparacion->fechaDeSalida){{date('d/m/y', strtotime($reparacion->fechaDeSalida))}}@else-@endisset</td>
                    <td>{{$reparacion->motivo}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-2">
            {{$reparaciones->links()}}
        </div>
    </div>    
        
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-bottom: 0px;">
    <h3 class="text-dark mb-0">Reporte de reparaciones</h3>
</div>
<div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-bottom: 0px;">
    @isset($record)
    <h6 class="text-dark mb-0">Datos correspondiente a reparaciones en estado {{$estado}} cargadas entre {{date('d/m/y', strtotime($fechaEntrada))}} a {{date('d/m/y', strtotime($fechaSalida))}}</h6>
    @else
    <h6 class="text-dark mb-0">Datos correspondiente a reparaciones en estado {{$estado}} cargadas desde {{date('d/m/y', strtotime($fechaEntrada))}} </h6>

    @endisset
</div>
<!-- Start: #reparacionesCard -->
@if ($reparaciones==null)
<div class="row">
    <div class="col">
        <div class="card shadow mb-4" style="width: 100%;max-width: 100%;min-width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">No hay reparaciones para la fecha selecionada</h6>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col">
        <div class="card shadow mb-4" style="width: 100%;max-width: 100%;min-width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Reparaciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info" style="margin-bottom: 0;">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Patente</th>
                                <th>Cliente</th>
                                <th style="width: 180px;">Fecha ingreso</th>
                                <th>Estado</th>
                                <th style="padding-right: 0;width: 90px;">Kilometraje</th>
                                <th>Fecha salida</th>
                                <th>Motivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reparaciones as $reparacion)

                            <tr>
                                <td>{{$reparacion->patente}}</td>
                                <td>{{$reparacion->cliente->apellido}} {{$reparacion->cliente->nombre}}</td>
                                <td>{{date('d/m/y', strtotime($reparacion->fechaDeEntrada))}}</td>
                                <td>{{ucfirst($reparacion->estado)}}</td>
                                <td style="padding-right: 0;">{{$reparacion->kilometraje}}</td>
                                <td> @isset($reparacion->fechaDeSalida){{date('d/m/y', strtotime($reparacion->fechaDeSalida))}}@else-@endisset </td>
                                <td>{{$reparacion->motivo}}</td>
                            </tr>                     
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: #reparacionesCard -->
<!-- Start: #accionesCard -->
<div class="row">
    <div class="col">
        <div class="card shadow mb-4" style="width: 100%;max-width: 100%;min-width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Acciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable-3" role="grid" aria-describedby="dataTable_info" style="margin-bottom: 0;">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 72%;">Nombre</th>
                                <th style="width: 18%;">Cantidad realizada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acciones  as $nombre => $cantidad)
                            <tr>
                                <td>{{$nombre}}</td>
                                <td>{{$cantidad}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: #accionesCard -->
<!-- Start: #piezasCard -->
<div class="row">
    <div class="col">
        <div class="card shadow mb-4" style="width: 100%;max-width: 100%;min-width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Piezas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Pieza</th>
                                <th style="width: 30%;">Fabricante</th>
                                <th style="width: 22%;">Modelo</th>
                                <th style="padding-right: 0;width: 18%;">Cantidad utilizada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($piezas as $pieza)
                            <tr>
                                <td>{{$pieza['nombre']}}</td>
                                <td>{{$pieza['fabricante']}}</td>
                                <td>{{$pieza['modelo']}}</td>
                                <td style="padding-right: 0;">{{$pieza['cantidad']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- End: #piezasCard -->
@endsection
@extends('layouts.appComprobante')

@section('content')     
<h1 style="text-align:center;">INFOMEC</h1>
    <h3 class="text-center text-dark mb-1" style="text-align: center;padding-top: 20px;background-color: #ffffff;">COMPROBANTE DE REPARACIÓN</h3>

    <table id="encabezado">
        <tr>
            <!-- Datos del cliente -->
            <td>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Datos del cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>{{$reparacion[0]->cliente->nombre}}</td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td>{{$reparacion[0]->cliente->apellido}} </td>
                        </tr>
                        <tr>
                            <td>DNI</td>
                            <td>{{$reparacion[0]->cliente->dni}}</td>
                        </tr>
                        <tr>
                            <td>Patente</td>
                            <td>{{$reparacion[0]->patente}}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <!-- Fecha -->
            <td style="padding-left: 10px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="padding-right: 30px;">Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="padding-left: 10px;">
                            <td>De entrada</td>
                            <td>{{date('d/m/y', strtotime($reparacion[0]->fechaDeEntrada))}}</td>
                        </tr>
                        <tr style="padding-left: 10px;">
                            <td>De salida</td>
                            <td>{{date('d/m/y', strtotime($reparacion[0]->fechaDeSalida))}}</td>
                        </tr>
                        <tr style="padding-left: 10px;"><td style="color:white;">empty</td></tr>
                        <tr style="padding-left: 10px;"><td style="color:white;">empty</td></tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    
    <hr>
    <h4 class="text-center" style="padding-top: 30px;">DETALLE</h4>
    
    <!-- Detalle -->
    @foreach ($tareas as $tarea)
    <table class="tabla-detalle">
        <thead style="text-align: left;">
            <tr>
                <th>
                    Tarea {{$loop->index+1}}
                </th>
                <th style="padding-left: 20px;">
                    Acción
                </th>
                <th style="padding-left: 20px;">
                    Piezas
                </th>
                <th style="padding-left: 20px;">
                    Subtotal
                </th>
            </tr>
        </thead>
        <tbody>
        
            <tr>
                <!-- Tarea DEJAR VACÍO -->
                <td></td>
                <!-- Acción -->
                <td style="padding-left: 20px;">
                    <p>{{$tarea->accion->nombre}} (${{$tarea->accion->precio}})</p>
                </td>
                <!-- Piezas -->
                <td style="padding-left: 20px;text-align:right;">
                    <!-- ACÁ PONER LA PRIMER PIEZA DEL LISTADO -->
                    <p>Cubierta C90 x1($2000)</p>
                </td>
                <!-- Subtotal -->
                <td style="padding-left: 20px;text-align:right;">
                    <p style="font-weight: 400;">${{$tarea->precio}}</p>
                </td>
            </tr>
            <!-- AGREGAR ESTO CADA VEZ QUE SE NECESITE OTRA PIEZA -->
            @foreach ($tarea->pieza as $pieza)
            <tr>
                <!-- DEJAR VACÍO -->
                <td></td>
                <!-- DEJAR VACÍO -->
                <td></td>
                <!-- Pieza -->
                <td>
                    <p>{{$pieza->nombre.' '.$pieza->modelo.' x'.$pieza->pivot->cantidad. "($".$pieza->pivot->precio.")"}}</p>
                </td>
                <!-- DEJAR VACÍO -->
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach

    <!-- Total -->
    <hr>
    <table style="margin-top: 40px;">
        <thead>
            <tr>
                <th>Total</th>
                <th style="padding-left: 20px;">Tiempo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>${{$totalprecio}}</p>
                </td>
                <td style="padding-left: 20px;">
                    <p>{{$totalHoras}}H</p>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
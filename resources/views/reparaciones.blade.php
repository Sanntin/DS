@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 17px;">
            <h3 class="text-dark mb-4">Reparaciones</h3>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row d-flex flex-row">
                        <!-- Start: buttons -->
                        <div class="col-md-6 text-nowrap" style="width: 33%;max-width: 70%;">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                            <div class="row">
                                <div class="col" style="padding-right: 0;padding-left: 20px;">
                                    <p style="margin-bottom: 0;">Reparaciones</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="padding-right: 0;padding-left: 10px;">
                                    <!-- Start: #generarReparacion --><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nueva reparación" href="generarReparacion1.html"><i class="fa fa-plus"></i></a>
                                    <!-- End: #generarReparacion -->
                                    <!-- Start: #reporteReparaciones --><button class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;" title="Generar reporte de reparaciones"><i class="fa fa-list-alt"></i></button>
                                    <!-- End: #reporteReparaciones -->
                                </div>
                            </div>
                        </div>
                        <!-- End: buttons -->
                        <!-- Start: #search -->
                        <div class="col-md-6 d-flex justify-content-end align-items-center align-content-center align-self-center" style="width: 33%;">
                            <div class="text-md-right d-flex align-items-center align-content-center align-self-center dataTables_filter" id="dataTable_filter"><label class="d-flex align-content-center align-self-center"><input class="justify-content-center align-items-start form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Buscar"><i class="fa fa-search d-flex justify-content-center align-items-center" data-toggle="tooltip" data-bs-tooltip="" style="padding-right: 20px;padding-left: 16px;background-color: #4e73df;filter: blur(0px) brightness(98%);color: rgb(247,248,253);" title="Buscar reparación"></i></label></div>
                        </div>
                        <!-- End: #search -->
                    </div>
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
                                <tr>
                                    <td>{{$reparacion->patente}}</td>
                                    <td>{{$reparacion->cliente->apellido}} {{$reparacion->cliente->nombre}}</td>
                                    <td>{{$reparacion->fechaDeEntrada}}</td>
                                    <td>{{$reparacion->estado}}</td>
                                    <td>{{$reparacion->kilometraje}}</td>
                                    <td>@isset($reparacion->fechaDeSalida){{$reparacion->fechaDeSalida}}@else-@endisset</td>
                                    <td>{{$reparacion->motivo}}</td>
                                </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-2">
                            {{$reparaciones->links()}}
                        </div>
                    </div>       
                </div>

            </div>
        </div>
    </div>
    <nav id="context-menu" class="context-menu">
        <ul class="context-menu__items">
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="View"><i class="fa fa-download"></i> Generar comprobante</a>
            </li>
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="Edit"><i class="fa fa-times"></i> Cancelar reparación</a>
            </li>
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="Delete"><i class="fa fa-plus"></i> Agregar orden de trabajo</a>
            </li>
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="Delete"><i class="fa fa-eye"></i> Ver órdenes de trabajo</a>
            </li>
        </ul>
    </nav>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © InfoMec 2021</span></div>
        </div>
    </footer>
</div>
@endsection
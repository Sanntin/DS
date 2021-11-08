@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 18px;">
            <h3 class="text-dark mb-4">Vehículos</h3>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <div class="row">
                                <div class="col">
                                    <p>Vehículo</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" href="cambiarTitularidad1.html" title="Cambiar titularidad del vehículo"><i class="fa fa-refresh"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Patente</th>
                                    <th>Titular</th>
                                    <th>Año</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{$vehiculo->patente}}</td>
                                    <td>{{$vehiculo->cliente->nombre}} {{$vehiculo->cliente->apellido}}</td>
                                    <td>{{$vehiculo->año}}</td>
                                    <td>{{$vehiculo->marca->nombre}}</td>
                                    <td>{{$vehiculo->modelo->nombre}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                   
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-2">
                            {{$vehiculos->links()}}
                        </div>
                    </div>    

                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © InfoMec 2021</span></div>
        </div>
    </footer>
</div>
@endsection
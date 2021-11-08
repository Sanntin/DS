@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 18px;">
            <h3 class="text-dark mb-4">Clientes</h3>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <div class="row">
                                <div class="col">
                                    <p style="margin-bottom: 0;">Cliente</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" href="cambiarTitularidad1.html" title="Agregar nuevo cliente" style="background-color: rgb(78,223,101);"><i class="fa fa-plus"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th>Localidad</th>
                                    <th>Dirección</th>
                                    <th>Mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->apellido}}</td>
                                    <td>{{$cliente->dni}}</td>
                                    <td>{{$cliente->telefono}}</td>
                                    <td>{{$cliente->localidad}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>{{$cliente->mail}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                    {{-- {{$clientes->links()}} --}}
                             <!-- Paginado -->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center pt-2">
                    {{$clientes->links()}}
                </div>
            </div>           
    
                    {{-- <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando 1 de 10 de los 27 totales</p>
                        </div>
                        <div class="col-md-6">
                          
                          
                                                      
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                       
                                    <li class="page-item active"> {{$clientes->links()}}</li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}
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
@extends('layouts.app')

@section('content')
<div id="clientes-main" class="shown">
    <h3 class="text-dark mb-4">Clientes</h3>
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="row" style="width: 100%;">
                <div class="col d-xl-flex align-items-xl-center">
                    <h6 class="text-primary font-weight-bold m-0">Clientes</h6>
                </div>
                <div class="col d-xl-flex justify-content-xl-end">
                    <button id="btnAgregarCliente" class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nuevo cliente"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body">
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
                        <tr class="t-row task task-cliente">
                            <td>Elon</td>
                            <td>Musk</td>
                            <td>35148594</td>
                            <td>2974581594</td>
                            <td>Houston</td>
                            <td>ABC</td>
                            <td>elon@musk.com</td>
                        </tr>
                        <tr class="t-row task task-cliente">
                            <td>Bill</td>
                            <td>Gates</td>
                            <td>1541587</td>
                            <td>893747</td>
                            <td>Seatle<br></td>
                            <td>Av Polonia 1500<br></td>
                            <td>bill@gates.com<br></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="clientes-agregar" class="hidden">
    <h3 class="text-dark mb-4">Agregar nuevo cliente</h3>
    <div class="card shadow">
        <div class="card-body d-xl-flex justify-content-xl-center">
            <div class="col-lg-7">
                <div class="p-5">
                    <form class="user">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Nombre" name="first_name"></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Apellido" name="last_name"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <!-- Start: #adress --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="DNI" name="dni">
                                <!-- End: #adress -->
                            </div>
                            <div class="col-sm-6">
                                <!-- Start: #phone --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Teléfono" name="phone">
                                <!-- End: #phone -->
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
</div>
<div id="clientes-modificar" class="hidden">
    <h3 class="text-dark mb-4">Modificar cliente</h3>
    <div class="card shadow">
        <div class="card-body d-xl-flex justify-content-xl-center">
            <div class="col-lg-7">
                <div class="p-5">
                    <form class="user">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Nombre" name="first_name"></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Apellido" name="last_name"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <!-- Start: #adress --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="DNI" name="dni">
                                <!-- End: #adress -->
                            </div>
                            <div class="col-sm-6">
                                <!-- Start: #phone --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Teléfono" name="phone">
                                <!-- End: #phone -->
                            </div>
                        </div>
                        <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mail" name="email"></div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Localidad" name="localidad"></div>
                            <div class="col-sm-6">
                                <!-- Start: #nickname --><input class="form-control form-control-user" type="text" id="exampleFirstName-1" placeholder="Dirección" name="direccion">
                                <!-- End: #nickname -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><button id="btnVolverModificarCliente" class="btn btn-primary btn-block text-white btn-user" type="button" style="background-color: rgb(223,78,104);">Volver</button></div>
                            <div class="col-sm-6"><button id="btnGuardarModificarCliente" class="btn btn-primary btn-block text-white btn-user" type="button">Agregar cliente</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
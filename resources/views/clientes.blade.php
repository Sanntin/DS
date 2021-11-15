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
                    <tbody id="clientes">
                        <script src="/assets/js/jquery.min.js"></script>
                        <script src="/assets/js/Cliente.js"></script>
                        <script src="/assets/js/clientes.js" type="module"></script>
                        <script src="/assets/js/common.js"></script>
                        <!-- @foreach ($clientes as $cliente)
                            <tr class="t-row task task-cliente">
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->apellido}}</td>
                                <td>{{$cliente->dni}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->localidad}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->mail}}</td>
                            </tr>
                        @endforeach -->
                        <script>
                            let clientes = [];
                            let clnt;
                            loadingScreen(true);
                            $.ajax({
                                url: "/clientesAjax",
                                method: 'get',
                                success: function(result){
                                    loadingScreen(false);
                                    for (const cliente of result.clientes) {
                                        clnt = new Cliente(cliente);
                                        clientes.push(clnt);
                                        document.getElementById("clientes").appendChild(clnt.getElement());
                                    }
                                }
                            });
                            turnListHover();
                            loadingScreen(false);
                        </script>
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
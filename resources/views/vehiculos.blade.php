@extends('layouts.app')

@section('content')
<div id="vehiculos-main" class="shown">
    <h3 class="text-dark mb-4">Vehículos</h3>
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="row" style="width: 100%;">
                <div class="col d-xl-flex align-items-xl-center">
                    <h6 class="text-primary font-weight-bold m-0">Vehículos</h6>
                </div>
                <div class="col d-xl-flex justify-content-xl-end">
                    <button id="btnAgregarVehiculo" class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nuevo vehículo"><i class="fa fa-plus"></i></button>
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
                            <th>Año</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehiculos as $vehiculo)
                        <tr class="t-row task task-vehicle">
                            <td>{{$vehiculo->patente}}</td>
                            <td>{{$vehiculo->cliente->nombre}} {{$vehiculo->cliente->apellido}}</td>
                            <td>{{$vehiculo->año}}</td>
                            <td>{{$vehiculo->marca->nombre}}</td>
                            <td>{{$vehiculo->modelo->nombre}}</td>
                        </tr>
                        @endforeach
                    </tbody>
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
<div id="vehiculos-agregar" class="hidden">
    <h3 class="text-dark mb-4">Agregar nuevo vehículo</h3>
    <div class="card shadow">
        <div class="card-body d-xl-flex justify-content-xl-center">
            <div class="col-lg-7">
                <div class="p-5">
                    <form class="user">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Patente" name="patente"></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Año" name="anio"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="dropdown border-primary"><button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;height: 50px;border: 1px solid rgba(0, 0, 0, 0.157);border-radius: 25px;">Marca</button>
                                    <div
                                        class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dropdown border-primary"><button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;height: 50px;border: 1px solid rgba(0, 0, 0, 0.157);border-radius: 25px;">Modelo</button>
                                <div
                                    class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                        </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0" style="max-width: 100%;min-width: 100%;">
                    <div class="dropdown border-primary"><button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;height: 50px;border: 1px solid rgba(0, 0, 0, 0.158);border-radius: 25px;">Titular</button>
                        <div class="dropdown-menu"
                            role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0"><button id="btnVolverAgregarVehiculo" class="btn btn-primary btn-block text-white btn-user" style="background-color: rgb(223,78,104);">Volver</button></div>
                <div class="col-sm-6"><button id="btnGuardarVehiculo" class="btn btn-primary btn-block text-white btn-user">Guardar cambios</button></div>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="vehiculos-cambiar" class="hidden">

</div>
@endsection
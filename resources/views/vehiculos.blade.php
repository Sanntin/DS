@extends('layouts.app')

@section('content')
<div id="vehiculos-main"   {{ session()->has('errorEnCargar')?  "class=hidden":"class=shown" }}>
    <h3 class="text-dark mb-4">Vehículos</h3>


    <div class="card shadow card-grid">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="row" style="width: 100%;">
                <div class="col d-xl-flex align-items-xl-center">
                    <h6 class="text-primary font-weight-bold m-0">Vehículos</h6>
                </div>

     
                <div class="col d-xl-flex justify-content-xl-end">          
                    <form method="POST" action="/vehiculos/filtrar">
                        @csrf
                     <div class="input-group search-box">
                        <input name='campo' class="bg-light form-control border-0 small" type="text" placeholder="Buscar ..."  value={{session()->get('campoV')}}>
                        <div class="input-group-append">
                            <button id="btnBuscarVehiculo" class="btn btn-primary py-0" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    </div>


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
                        @isset($vehiculos)
                        @foreach ($vehiculos as $vehiculo)
                        <tr class="t-row task task-vehicle"  data-id={{$vehiculo->id}}>
                            <td>{{$vehiculo->patente}}</td>
                            <td>{{$vehiculo->cliente->nombre}} {{$vehiculo->cliente->apellido}}</td>
                            <td style="text-align: right;">{{$vehiculo->año}}</td>
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
                    @endisset
                </div>
            </div>   
        </div>
    </div>
</div>

<div id="vehiculos-agregar"    {{ session()->has('errorEnCargar')? "class=shown" : "class=hidden" }} >
    <h3 class="text-dark mb-4">Agregar nuevo vehículo</h3>
    <form method="POST" action="/vehiculos/agregarVehiculo">
        @csrf
        <div class="card shadow">
            <div class="card-body d-xl-flex justify-content-xl-center">
                <div class="col-lg-7">
                    <div class="p-5">
                        <form class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="text" id="patente" placeholder="Patente (ABC123)" name="patente" maxlength="7" minlength="6"  value={{old('patente')}}>
                                    @error('patente')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="number" min="1900" max="2099" value={{old('año')? old('año'):'2021'}}  id="año" placeholder="Año" name="año" }>
                                    @error('año')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="dropdown border-primary">
                                        @if(session()->has('marcas'))
                                        <select name="id_marca" id="marcas" class="form-control js-example-basic-single" >
                                            <option id='doption' value="" selected hidden>Seleccione un marca</option>
                                            @foreach (session()->get('marcas') as $marca)
                                                <option value="{{$marca->id}}" {{old('id_marca')==$marca->id ? "selected":''}} > {{$marca->nombre}} </option>
                                            @endforeach

                                        @else
                                            <select name="id_marca" id="marcas"  class="form-control js-example-basic-single" disabled >
                                            <option value="" selected='true' selected hidden>Seleccione un marca</option>
                                        @endif
                                        </select>
                                        @error('marca')
                                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                        </div>
                            </div>
                            <div class="col-sm-6">
                             
                                    @if(session()->has('modelos'))
                                    <select name="id_modelo" id="modelos"  class="form-control js-example-basic-single" >
                                        @foreach (session()->get('modelos') as $modelo)
                                         <option value="{{$modelo->id}}" {{old('id_modelo')==$modelo->id ? "selected":''}} >{{$modelo->nombre}}</option>
                                        @endforeach  
                                    
                                    @else 
                                        <select name="id_modelo" id="modelos"  class="form-control js-example-basic-single" disabled >
                                            <option  value="" selected='true' selected hidden>Seleccione un modelo</option>
                                    @endif
                                    </select>
                                    @error('modelo')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0" style="max-width: 100%;min-width: 100%;">
                            @if(session()->has('clientes'))
                            <select name="dniCliente" id="clientes" class="form-control" >
                                @foreach (session()->get('clientes') as $cliente)
                                    <option value="{{$cliente->dni}}" {{old('dniCliente')==$cliente->dni ? "selected":''}}>{{$cliente->apellido}} {{$cliente->nombre}} DNI: {{$cliente->dni}}</option>
                                @endforeach
                            @else
                            <select name="dniCliente" id="clientes" class="form-control js-example-basic-single"  style="width: 100%" disabled >
                                <option value="" selected='true' selected>Seleccione un titular</option>
                            @endif
                            </select>
                            @error('cliente')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <button id="btnVolverAgregarVehiculo" class="btn btn-primary btn-block text-white btn-user" style="background-color: rgb(223,78,104);" onclick="volverAgregarVehiculo()">Volver</button>
                    </div>

                    <div class="col-sm-6">
                        <button id="btnGuardarVehiculo" class="btn btn-primary btn-block text-white btn-user" onclick="submit">Guardar cambios</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </form>
</div>
<div id="vehiculos-cambiar" class="hidden">

</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 17px;">
            <h3 class="text-dark rubberBand animated mb-4">Stock</h3>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                            <div class="row">
                                <div class="col">
                                    <p style="margin-bottom: 0;">Stock</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Cargar stock" href="cargarStock.html" style="background-color: rgb(116,223,78);"><i class="fa fa-plus"></i></a><a class="btn btn-primary"
                                        role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;" title="Realizar pedido de pieza" href="realizarPedidoPieza.html"><i class="fa fa-envelope-o"></i></a></div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center align-content-center align-self-center">
                            <div class="text-md-right d-flex align-items-center align-content-center align-self-center dataTables_filter" id="dataTable_filter"><label class="d-flex align-content-center align-self-center"><input class="justify-content-center align-items-start form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Buscar"><i class="fa fa-search d-flex justify-content-center align-items-center" style="padding-right: 20px;padding-left: 16px;background-color: #4e73df;filter: blur(0px) brightness(98%);color: rgb(247,248,253);"></i></label></div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                  
                                    <th>Pieza</th>
                                    <th>Fabricante</th>
                                   <th style="width: 180px;">Modelo</th>
                                    <th>Precio</th>
                                    <th style="padding-right: 0;width: 90px;">Cantidad</th>
                                    <th>ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($piezas as $pieza)
    
                                <tr>
                                    <td>{{$pieza->nombre}}</td>
                                    <td>{{$pieza->fabricante->nombre}}</td>
                                    <td>{{$pieza->modelo}}</td>
                                    <td>{{$pieza->precio}}</td>
                                    <td>Agregar</td>
                                    <td>{{$pieza->id}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-2">
                            {{$piezas->links()}}
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
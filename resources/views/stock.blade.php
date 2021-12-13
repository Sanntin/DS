@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Stock</h3>
<div class="card shadow">
<div class="card-header d-flex justify-content-between align-items-center">
    <div class="row" style="width: 100%;">
        <div class="col d-xl-flex align-items-xl-center">
            <h6 class="text-primary font-weight-bold m-0">Stock</h6>
        </div>
        <div class="col d-xl-flex justify-content-xl-end">
            <form method="POST" action="/stock/filtrar">
                @csrf
             <div class="input-group search-box">
                <input name='campo' class="bg-light form-control border-0 small" type="text" placeholder="Buscar ..."  value={{session()->get('campoS')}}>
                <div class="input-group-append">
                    <button id="btnBuscarVehiculo" class="btn btn-primary py-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    @if (sizeof($piezas)<1)
    <div class="text-center my-auto copyright">No se ha encontrado piezas con los parámetros de búsqueda ingresados.</div>
    @else


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

                <tr class="t-row task task-stock"  data-id={{$pieza->id}}>
                    <td>{{$pieza->nombre}}</td>
                    <td>{{$pieza->fabricante->nombre}}</td>
                    <td>{{$pieza->modelo}}</td>
                    <td style="text-align: right;">{{$pieza->precio}}</td>
                    <td style="text-align: right;">{{$pieza->cantidad}}</td>
                    <td style="text-align: right;">{{$pieza->id}}</td>
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
    @endif    
</div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<h1 class="text-center" style="padding-top: 20px;">Agregar tarea</h1>
<div class="container" style="width: 100%;min-width: 100%;padding-left: 0;padding-right: 0;min-height: 100%;height: 100%;max-height: 100%;background-color: rgba(255,0,0,0);">
    <section>
        <!-- Start: #accion -->
        <article style="padding-right: 200px;padding-left: 200px;">
            <h1 class="text-center" style="font-size: 17px;margin-top: 20px;font-weight: 700;">Seleccione una acción</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-weight: 700;">Acción</td>
                            <td>
                                <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;">Acciones</button>
                                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
        <!-- End: #accion -->
        <!-- Start: #piezas -->
        <article style="padding-right: 200px;padding-left: 200px;">
            <h3 class="text-center" style="font-size: 17px;font-weight: 700;">Seleccione las piezas a utilizar e ingrese el precio de la misma</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pieza</th>
                            <th style="width: 100px;">Precio</th>
                            <th style="width: 20px;">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;">Piezas</button>
                                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                                </div>
                            </td>
                            <td><input type="number" style="width: 100px;"></td>
                            <td><input type="number" style="width: 70px;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
        <!-- End: #piezas -->
        <!-- Start: botones -->
        <article>
            <div class="row">
                <div class="col d-flex justify-content-center align-content-center"><a class="btn btn-primary d-flex justify-content-center align-self-center" role="button" data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;" title="Agregar tarea" href="generarOrdenDeTrabajo.html">Listo</a></div>
                <div class="col d-flex justify-content-center align-items-center align-content-center align-self-center"><a class="btn btn-primary text-center d-flex justify-content-center align-self-center" role="button" data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;background-color: rgb(223,78,95);" href="generarOrdenDeTrabajo.html"
                        title="Cancelar y volver a la orden de trabajo">Cancelar</a></div>
            </div>
        </article>
        <!-- End: botones -->
    </section>
</div>
@endsection
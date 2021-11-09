@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Generar nueva reparación</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Nueva reparación</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container" style="width: 100%;min-width: 100%;padding-left: 0;padding-right: 0;min-height: 100%;height: 100%;max-height: 100%;background-color: rgba(255,0,0,0);">
            <section>
                <!-- Start: #accion -->
                <article style="padding-right: 200px;padding-left: 200px;">
                    <div class="row">
                        <div class="col d-flex d-xl-flex align-items-center align-content-center align-self-center justify-content-xl-start align-items-xl-center">
                            <p class="d-flex float-none d-xl-flex align-items-center align-self-center justify-content-xl-start align-items-xl-center" style="font-weight: 700;">Vehículo</p>
                        </div>
                        <div class="col">
                            <div class="dropdown" style="width: 100%;"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;">Dropdown </button>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex d-xl-flex align-items-center align-content-center align-self-center justify-content-xl-start align-items-xl-center">
                            <p class="d-flex float-none d-xl-flex align-items-center align-self-center justify-content-xl-start align-items-xl-center" style="font-weight: 700;">Kilometraje</p>
                        </div>
                        <div class="col"><input type="number" style="width: 100%;"></div>
                    </div>
                    <div class="row">
                        <div class="col d-flex d-xl-flex align-items-center align-content-center align-self-center justify-content-xl-start align-items-xl-center">
                            <p class="d-flex float-none d-xl-flex align-items-center align-self-center justify-content-xl-start align-items-xl-center" style="font-weight: 700;">Motivo</p>
                        </div>
                        <div class="col"><input type="text" style="width: 100%;"></div>
                    </div>
                </article>
                <!-- End: #accion -->
                <!-- Start: botones -->
                <article>
                    <div class="row">
                        <div class="col d-flex justify-content-center align-content-center"><a class="btn btn-primary d-flex justify-content-center align-self-center" role="button" data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;" title="Agregar tarea" href="generarOrdenDeTrabajo.html">Generar</a></div>
                        <div
                            class="col d-flex justify-content-center align-items-center align-content-center align-self-center"><a class="btn btn-primary text-center d-flex justify-content-center align-self-center" role="button" data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;background-color: rgb(223,78,95);" href="generarOrdenDeTrabajo.html"
                                title="Cancelar y volver a la orden de trabajo">Cancelar</a></div>
        </div>
        </article>
        <!-- End: botones -->
        </section>
    </div>
</div>
@endsection
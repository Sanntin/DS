@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Reparaciones</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Reparaciones</h6>
            </div>
            <div class="col d-xl-flex justify-content-xl-end">
                <!-- Start: #generarReparacion --><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nueva reparación" href="generarReparacion1.html"><i class="fa fa-plus"></i></a>
                        <!-- End: #generarReparacion -->
                        <!-- Start: #reporteReparaciones --><button class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;" title="Generar reporte de reparaciones"><i class="fa fa-list-alt"></i></button>
                        <!-- End: #reporteReparaciones -->
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
                        <th style="width: 180px;">Fecha ingreso</th>
                        <th>Estado</th>
                        <th style="padding-right: 0;width: 90px;">Kilometraje</th>
                        <th>Fecha salida</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="t-row task task-repair" data-id="1">
                        <td>ABC-123</td>
                        <td>Elon Musk</td>
                        <td>21/09/2021</td>
                        <td>En proceso</td>
                        <td style="padding-right: 0;">54000</td>
                        <td>-</td>
                        <td>Hace "rututu pum pum"</td>
                    </tr>
                    <tr class="t-row task task-repair">
                        <td>ASD-234</td>
                        <td>31584893</td>
                        <td>21/09/2021<br></td>
                        <td>En proceso</td>
                        <td>12000<br></td>
                        <td>-<br></td>
                        <td>No anda<br></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
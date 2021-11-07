@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Clientes</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Clientes</h6>
            </div>
            <div class="col d-xl-flex justify-content-xl-end">
                <a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nuevo cliente" href="generarReparacion1.html"><i class="fa fa-plus"></i></a>
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
@endsection
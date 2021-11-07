@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Vehículos</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Vehículos</h6>
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
                    <tr class="t-row task task-vehicle">
                        <td>BTC-123</td>
                        <td>Bill Gates</td>
                        <td>2009</td>
                        <td>Renault</td>
                        <td>Clio</td>
                    </tr>
                    <tr class="t-row task task-vehicle">
                        <td>ETH-234</td>
                        <td>Steve Jobs</td>
                        <td>2015</td>
                        <td>Toyota</td>
                        <td>Hilux<br></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
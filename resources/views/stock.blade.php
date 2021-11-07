@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Stock</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Stock</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
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
                    <tr class="t-row task task-stock">
                        <td>Cubierta</td>
                        <td>Pirelli</td>
                        <td>C90</td>
                        <td>9300</td>
                        <td style="padding-right: 0;">12</td>
                        <td>1</td>
                    </tr>
                    <tr class="t-row task task-stock">
                        <td>Lámpara</td>
                        <td>Tesla</td>
                        <td>Nikola</td>
                        <td>2000</td>
                        <td>20<br></td>
                        <td>2<br></td>
                    </tr>
                    <tr class="t-row task task-stock">
                        <td>Puerta</td>
                        <td>Toyota</td>
                        <td>Hilux</td>
                        <td>62000</td>
                        <td>3<br></td>
                        <td>3<br></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
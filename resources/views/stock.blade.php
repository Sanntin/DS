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
                                <tr>
                                    <td>Cubierta</td>
                                    <td>Pirelli</td>
                                    <td>C90</td>
                                    <td>9300</td>
                                    <td style="padding-right: 0;">12</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Lámpara</td>
                                    <td>Tesla</td>
                                    <td>Nikola</td>
                                    <td>2000</td>
                                    <td>20<br></td>
                                    <td>2<br></td>
                                </tr>
                                <tr>
                                    <td>Puerta</td>
                                    <td>Toyota</td>
                                    <td>Hilux</td>
                                    <td>62000</td>
                                    <td>3<br></td>
                                    <td>3<br></td>
                                </tr>
                                <tr>
                                    <td>Pintura</td>
                                    <td>DaVinci</td>
                                    <td>x23018d0a0284</td>
                                    <td>6000</td>
                                    <td>51<br></td>
                                    <td>4<br></td>
                                </tr>
                                <tr>
                                    <td>Batería</td>
                                    <td>Apple</td>
                                    <td>San Francisco</td>
                                    <td>10000</td>
                                    <td>10<br></td>
                                    <td>5<br></td>
                                </tr>
                                <tr>
                                    <td>Aceite</td>
                                    <td>Marolio</td>
                                    <td>Girasol</td>
                                    <td>4000</td>
                                    <td>30<br></td>
                                    <td>6<br></td>
                                </tr>
                                <tr>
                                    <td>Turbo<br></td>
                                    <td>Toreto</td>
                                    <td>Dominic</td>
                                    <td>25000</td>
                                    <td>6<br></td>
                                    <td>7<br></td>
                                </tr>
                                <tr>
                                    <td>Nitro</td>
                                    <td>Brian</td>
                                    <td>O'Connor</td>
                                    <td>40000</td>
                                    <td>4<br></td>
                                    <td>8<br></td>
                                </tr>
                                <tr>
                                    <td>Escape</td>
                                    <td>Renault</td>
                                    <td>x2dar23a</td>
                                    <td>10000</td>
                                    <td>5<br></td>
                                    <td>9<br></td>
                                </tr>
                                <tr>
                                    <td>Núcleo Cuántico</td>
                                    <td>Carrefour</td>
                                    <td>xgha2</td>
                                    <td>10000</td>
                                    <td>2<br></td>
                                    <td>10<br></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Nombre</strong></td>
                                    <td><strong>Modelo</strong></td>
                                    <td><strong>Fabricante</strong></td>
                                    <td><strong>Precio</strong></td>
                                    <td><strong>Cantidad</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando 1 de 10 de los 27 totales</p>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
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
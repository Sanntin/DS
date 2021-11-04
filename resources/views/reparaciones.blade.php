@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 17px;">
            <h3 class="text-dark mb-4">Reparaciones</h3>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row d-flex flex-row">
                        <!-- Start: buttons -->
                        <div class="col-md-6 text-nowrap" style="width: 33%;max-width: 70%;">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                            <div class="row">
                                <div class="col" style="padding-right: 0;padding-left: 20px;">
                                    <p style="margin-bottom: 0;">Reparaciones</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="padding-right: 0;padding-left: 10px;">
                                    <!-- Start: #generarReparacion --><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nueva reparación" href="generarReparacion1.html"><i class="fa fa-plus"></i></a>
                                    <!-- End: #generarReparacion -->
                                    <!-- Start: #reporteReparaciones --><button class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;" title="Generar reporte de reparaciones"><i class="fa fa-list-alt"></i></button>
                                    <!-- End: #reporteReparaciones -->
                                </div>
                            </div>
                        </div>
                        <!-- End: buttons -->
                        <!-- Start: #search -->
                        <div class="col-md-6 d-flex justify-content-end align-items-center align-content-center align-self-center" style="width: 33%;">
                            <div class="text-md-right d-flex align-items-center align-content-center align-self-center dataTables_filter" id="dataTable_filter"><label class="d-flex align-content-center align-self-center"><input class="justify-content-center align-items-start form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Buscar"><i class="fa fa-search d-flex justify-content-center align-items-center" data-toggle="tooltip" data-bs-tooltip="" style="padding-right: 20px;padding-left: 16px;background-color: #4e73df;filter: blur(0px) brightness(98%);color: rgb(247,248,253);" title="Buscar reparación"></i></label></div>
                        </div>
                        <!-- End: #search -->
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Patente</th>
                                    <th>DNI</th>
                                    <th style="width: 180px;">Fecha ingreso</th>
                                    <th>Estado</th>
                                    <th style="padding-right: 0;width: 90px;">Kilometraje</th>
                                    <th>Fecha salida</th>
                                    <th>Motivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="t-row task" data-id="1">
                                    <td>ABC-123</td>
                                    <td>35148596</td>
                                    <td>21/09/2021</td>
                                    <td>En proceso</td>
                                    <td style="padding-right: 0;">54000</td>
                                    <td>-</td>
                                    <td>Hace "rututu pum pum"</td>
                                </tr>
                                <tr class="t-row task">
                                    <td>ASD-234</td>
                                    <td>31584893</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>12000<br></td>
                                    <td>-<br></td>
                                    <td>No anda<br></td>
                                </tr>
                                <tr>
                                    <td>FSA-345</td>
                                    <td>25874569</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>9854<br></td>
                                    <td>-<br></td>
                                    <td>Acelera pero va para atrás<br></td>
                                </tr>
                                <tr>
                                    <td>YAF-435</td>
                                    <td>15845965</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>0<br></td>
                                    <td>-<br></td>
                                    <td>No prende<br></td>
                                </tr>
                                <tr>
                                    <td>TAF-678</td>
                                    <td>15269458</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>8745<br></td>
                                    <td>-<br></td>
                                    <td>No apaga<br></td>
                                </tr>
                                <tr>
                                    <td>IRH-457</td>
                                    <td>10256987</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>90000<br></td>
                                    <td>-<br></td>
                                    <td>Está muy caro<br></td>
                                </tr>
                                <tr>
                                    <td>BSG-623<br></td>
                                    <td>33222555</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>1000000<br></td>
                                    <td>-<br></td>
                                    <td>Volcó 27 veces<br></td>
                                </tr>
                                <tr>
                                    <td>BAE-235</td>
                                    <td>33333333</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>9999999<br></td>
                                    <td>-<br></td>
                                    <td>Va muy rápido<br></td>
                                </tr>
                                <tr>
                                    <td>SGR-463</td>
                                    <td>34444444</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>3254<br></td>
                                    <td>-<br></td>
                                    <td>Va muy lento<br></td>
                                </tr>
                                <tr>
                                    <td>BGT-445</td>
                                    <td>35555555</td>
                                    <td>21/09/2021<br></td>
                                    <td>En proceso</td>
                                    <td>548754<br></td>
                                    <td>-<br></td>
                                    <td>Se lo robaron<br></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr></tr>
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
    <nav id="context-menu" class="context-menu">
        <ul class="context-menu__items">
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="View"><i class="fa fa-download"></i> Generar comprobante</a>
            </li>
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="Edit"><i class="fa fa-times"></i> Cancelar reparación</a>
            </li>
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="Delete"><i class="fa fa-plus"></i> Agregar orden de trabajo</a>
            </li>
            <li class="context-menu__item">
                <a href="#" class="context-menu__link" data-action="Delete"><i class="fa fa-eye"></i> Ver órdenes de trabajo</a>
            </li>
        </ul>
    </nav>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © InfoMec 2021</span></div>
        </div>
    </footer>
</div>
@endsection
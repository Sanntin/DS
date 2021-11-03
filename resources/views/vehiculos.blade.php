@extends('layouts.app')

@section('content')
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>InfoMec</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="reparaciones.html"><i class="fas fa-tachometer-alt"></i><span>Reparaciones</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="stock.html"><i class="fas fa-user"></i><span>Stock</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="vehículos.html"><i class="fas fa-table"></i><span>Vehículos</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid" style="padding-top: 18px;">
                    <h3 class="text-dark mb-4">Vehículos</h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div class="row">
                                        <div class="col">
                                            <p>Vehículo</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" href="cambiarTitularidad1.html" title="Cambiar titularidad del vehículo"><i class="fa fa-refresh"></i></a></div>
                                    </div>
                                </div>
                            </div>
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
                                        <tr>
                                            <td>BTC-123</td>
                                            <td>Bill Gates</td>
                                            <td>2009</td>
                                            <td>Renault</td>
                                            <td>Clio</td>
                                        </tr>
                                        <tr>
                                            <td>ETH-234</td>
                                            <td>Steve Jobs</td>
                                            <td>2015</td>
                                            <td>Toyota</td>
                                            <td>Hilux<br></td>
                                        </tr>
                                        <tr>
                                            <td>DGE-452</td>
                                            <td>Elon Musk</td>
                                            <td>2021</td>
                                            <td>Tesla</td>
                                            <td>Cybertruck<br></td>
                                        </tr>
                                        <tr>
                                            <td>BNB-992</td>
                                            <td>Steve Wozniak</td>
                                            <td>1976</td>
                                            <td>Lamborghini</td>
                                            <td>Diablo<br></td>
                                        </tr>
                                        <tr>
                                            <td>LTE-215</td>
                                            <td>Paul Allen</td>
                                            <td>2018</td>
                                            <td>Bugatti</td>
                                            <td>Veyron<br></td>
                                        </tr>
                                        <tr>
                                            <td>DOT-423</td>
                                            <td>Cristiano Ronaldo</td>
                                            <td>2021</td>
                                            <td>BMW</td>
                                            <td>240<br></td>
                                        </tr>
                                        <tr>
                                            <td>SHI-028<br></td>
                                            <td>El Diego</td>
                                            <td>1985</td>
                                            <td>Pagani</td>
                                            <td>Zonda<br></td>
                                        </tr>
                                        <tr>
                                            <td>USD-928</td>
                                            <td>Satoshi Nakamoto</td>
                                            <td>2003</td>
                                            <td>Peugeot</td>
                                            <td>206<br></td>
                                        </tr>
                                        <tr>
                                            <td>ARS-283</td>
                                            <td>Vitalik Buterin</td>
                                            <td>2019</td>
                                            <td>Ford</td>
                                            <td>Raptor<br></td>
                                        </tr>
                                        <tr>
                                            <td>UNI-927</td>
                                            <td>Linus Torvalds</td>
                                            <td>2030</td>
                                            <td>Apple</td>
                                            <td>iCar<br></td>
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
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © InfoMec 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
</body>
@endsection
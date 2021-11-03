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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="vehículos.html"><i class="fas fa-table"></i><span>Vehículos</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid" style="padding-top: 17px;">
                    <h3 class="text-dark mb-4">Órdenes de trabajo</h3>
                    <!-- Start: #reparacion -->
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" href="reparaciones.html" title="Volver a reparaciones"><i class="fa fa-arrow-left"></i></a></div>
                            </div>
                            <!-- Start: Reparacion-seleccionada -->
                            <section>
                                <!-- Start: header -->
                                <article>
                                    <h3 class="text-center" style="font-size: 17px;margin-top: 20px;font-weight: 700;">Usted ha elegido la siguiente reparación</h3>
                                </article>
                                <!-- End: header -->
                                <!-- Start: tabla -->
                                <article style="padding-right: 200px;padding-left: 200px;">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Patente</th>
                                                    <th style="font-weight: 400;">ABC-123</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight: 700;">DNI</td>
                                                    <td>35148596</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700;">Fecha ingreso</td>
                                                    <td>21/09/2021</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700;">Estado</td>
                                                    <td>En proceso</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700;">Kilometraje</td>
                                                    <td>54000</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700;">Fecha salida</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700;">Motivo</td>
                                                    <td>Hace rututu pum pum</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </article>
                                <!-- End: tabla -->
                            </section>
                            <!-- End: Reparacion-seleccionada -->
                        </div>
                    </div>
                    <!-- End: #reparacion -->
                    <!-- Start: #ordenDeTrabajo -->
                    <div class="card shadow" style="margin-top: 30px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col" style="max-width: 200px;">
                                    <h4 style="font-weight: 700;font-size: 17px;">Orden de trabajo 1</h4>
                                </div>
                                <div class="col">
                                    <div class="row" style="margin-right: 0;">
                                        <div class="col" style="padding-right: 11px;">
                                            <p style="margin-bottom: 0;font-size: 13px;">Orden de trabajo</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" href="confirmarOrdenDeTrabajo.html" title="Confirmar esta orden de trabajo" style="background-color: rgb(78,223,84);"><i class="fa fa-check"></i></a>
                                            <button
                                                class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;background-color: rgb(223,78,87);" title="Cancelar esta orden de trabajo"><i class="fa fa-remove"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <p style="margin-bottom: 0;font-weight: 700;">Estado:</p>
                                        </div>
                                        <div class="col">
                                            <p style="margin-bottom: 0;">En proceso</p>
                                        </div>
                                        <div class="col">
                                            <p style="margin-bottom: 0;font-weight: 700;">% de avance:</p>
                                        </div>
                                        <div class="col">
                                            <p style="margin-bottom: 0;">0%</p>
                                        </div>
                                        <div class="col">
                                            <p style="margin-bottom: 0;font-weight: 700;">Horas totales:</p>
                                        </div>
                                        <div class="col">
                                            <p style="margin-bottom: 0;">2H</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start: #tarea -->
                            <section>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col" style="width: 100px;min-width: 10px;max-width: 100px;">
                                        <h4 style="font-weight: 700;font-size: 17px;">Tarea 1</h4>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <p style="font-size: 13px;margin-bottom: 0;">Tarea</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="background-color: rgb(81,223,78);" href="completarTarea.html" title="Completar esta tarea"><i class="fa fa-check"></i></a>
                                                <button
                                                    class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;background-color: rgb(223,78,95);" title="Eliminar esta tarea"><i class="fa fa-remove"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Hora</th>
                                                        <th>Estado</th>
                                                        <th>Precio tarea</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10/10/21</td>
                                                        <td>10:00</td>
                                                        <td>En proceso</td>
                                                        <td>1200</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Acción</th>
                                                        <th>Pieza</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio pieza</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Cambio de aceite</td>
                                                        <td>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">Aceite Marolio z85</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">1</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">1200</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End: #tarea -->
                            <!-- Start: #tarea -->
                            <section>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col" style="width: 100px;min-width: 10px;max-width: 100px;">
                                        <h4 style="font-weight: 700;font-size: 17px;">Tarea 2</h4>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <p style="font-size: 13px;margin-bottom: 0;">Tarea</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="background-color: rgb(81,223,78);" href="completarTarea.html" title="Completar esta tarea"><i class="fa fa-check"></i></a>
                                                <button
                                                    class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;background-color: rgb(223,78,95);" title="Eliminar esta tarea"><i class="fa fa-remove"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Hora</th>
                                                        <th>Estado</th>
                                                        <th>Precio tarea</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10/10/21</td>
                                                        <td>10:00</td>
                                                        <td>En proceso</td>
                                                        <td>5500</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Acción</th>
                                                        <th>Pieza</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio pieza</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Limpieza</td>
                                                        <td>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">Alfombrilla</p>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">Escobilla</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">2</p>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">1</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">4000</p>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                    <p style="margin-bottom: 0;">1500</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End: #tarea -->
                        </div>
                    </div>
                    <!-- End: #ordenDeTrabajo -->
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
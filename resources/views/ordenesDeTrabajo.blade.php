@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 17px;">
            <h3 class="text-dark mb-4">Órdenes de trabajo</h3>
            <!-- Start: #reparacion -->
            <div class="card shadow">
                <div class="card-body">
                    <!-- Start: Reparacion-seleccionada -->
                    <section>
                        <!-- Start: header -->
                        <article>
                            <div class="row">
                                <div class="col" style="width: 20px;max-width: 65px;"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" href="reparaciones" title="Volver a reparaciones"><i class="fa fa-arrow-left"></i></a></div>
                                <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                    <h3 class="text-center" style="font-size: 17px;margin-top: 0;font-weight: 700;margin-bottom: 0;">Usted ha seleccionado la siguiente reparación</h3>
                                </div>
                            </div>
                        </article>
                        <!-- End: header -->
                        <article>
                            <div class="row" style="padding-left: 10px;margin-top: 15px;">
                                <div class="col" style="font-weight: 700;">
                                    <p style="margin-bottom: 0;">Patente</p>
                                </div>
                                <div class="col" style="font-weight: 700;">
                                    <p style="margin-bottom: 0;">Titular</p>
                                </div>
                                <div class="col" style="font-weight: 700;">
                                    <p style="margin-bottom: 0;">Fecha ingreso</p>
                                </div>
                                <div class="col" style="font-weight: 700;">
                                    <p style="margin-bottom: 0;">Estado</p>
                                </div>
                                <div class="col" style="font-weight: 700;">
                                    <p style="margin-bottom: 0;">Fecha salida</p>
                                </div>
                                <div class="col" style="font-weight: 700;">
                                    <p style="margin-bottom: 0;">Kilometraje</p>
                                </div>
                                <div class="col" style="font-weight: 700;">
                                    <p style="margin-bottom: 0;">Motivo</p>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 10px;">
                                <div class="col" style="font-weight: 400;">
                                    <p style="margin-bottom: 0;">ABC-123</p>
                                </div>
                                <div class="col" style="font-weight: 400;">
                                    <p style="margin-bottom: 0;">Elon Musk</p>
                                </div>
                                <div class="col" style="font-weight: 400;">
                                    <p style="margin-bottom: 0;">12/10/21</p>
                                </div>
                                <div class="col" style="font-weight: 400;">
                                    <p style="margin-bottom: 0;">En proceso</p>
                                </div>
                                <div class="col" style="font-weight: 400;">
                                    <p style="margin-bottom: 0;">-</p>
                                </div>
                                <div class="col" style="font-weight: 400;">
                                    <p style="margin-bottom: 0;">120000km</p>
                                </div>
                                <div class="col" style="font-weight: 400;">
                                    <p style="margin-bottom: 0;">No arranca</p>
                                </div>
                            </div>
                        </article>
                    </section>
                    <!-- End: Reparacion-seleccionada -->
                </div>
            </div>
            <!-- End: #reparacion -->
            <!-- Start: #ordenDeTrabajo -->
            <div class="card shadow" style="margin-top: 15px;">
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
                    <div class="card" style="margin-top: 15px;">
                        <div class="card-body">
                            <!-- Start: #tarea -->
                            <section>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col d-xl-flex justify-content-xl-center align-items-xl-center" style="width: 100px;min-width: 10px;max-width: 100px;">
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
                        </div>
                    </div>
                    <div class="card" style="margin-top: 15px;">
                        <div class="card-body">
                            <!-- Start: #tarea -->
                            <section>
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col d-xl-flex justify-content-xl-center align-items-xl-center" style="width: 100px;min-width: 10px;max-width: 100px;">
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
</div>
@endsection
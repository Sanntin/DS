@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Cargar stock</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Stock</h6>
            </div>
        </div>
    </div>
    <div class="card-body d-xl-flex flex-column justify-content-xl-center">
        <div class="row">
            <div class="col">
                <!-- Start: #reparacion -->
                <div class="card shadow">
                    <div class="card-body">
                        <!-- Start: Reparacion-seleccionada -->
                        <section>
                            <!-- Start: header -->
                            <article>
                                <div class="row">
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <h3 class="text-center" style="font-size: 17px;margin-top: 0;font-weight: 700;margin-bottom: 0;">Usted ha seleccionado la siguiente pieza</h3>
                                    </div>
                                </div>
                            </article>
                            <!-- End: header -->
                            <article>
                                <div class="row" style="padding-left: 10px;margin-top: 15px;">
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Nombre</p>
                                    </div>
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Fabricante</p>
                                    </div>
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Modelo</p>
                                    </div>
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Precio</p>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 10px;">
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">Cubierta</p>
                                    </div>
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">Pirelli</p>
                                    </div>
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">C90</p>
                                    </div>
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">1200</p>
                                    </div>
                                </div>
                            </article>
                        </section>
                        <!-- End: Reparacion-seleccionada -->
                    </div>
                </div>
                <!-- End: #reparacion -->
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col">
                <div class="p-5">
                    <form class="user">
                        <div class="form-group row">
                            <div class="col-sm-6 d-xl-flex justify-content-xl-start align-items-xl-center mb-3 mb-sm-0" style="max-width: 20%;">
                                <p style="margin-bottom: 0;font-weight: 700;">Cantidad a agregar</p>
                            </div>
                            <div class="col-sm-6" style="max-width: 80%;width: 85%;min-width: 80%;"><input class="form-control form-control-user" type="number" id="exampleFirstName" placeholder="Cantidad a agregar" name="last_name"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 d-xl-flex justify-content-xl-start align-items-xl-center mb-3 mb-sm-0" style="max-width: 20%;">
                                <p style="margin-bottom: 0;font-weight: 700;">Nuevo precio</p>
                            </div>
                            <div class="col-sm-6" style="max-width: 80%;width: 85%;min-width: 80%;"><input class="form-control form-control-user" type="number" id="exampleFirstName" placeholder="Nuevo precio" name="last_name"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0"><button class="btn btn-primary btn-block text-white btn-user" type="button" style="background-color: rgb(223,78,104);">Cancelar</button></div>
                            <div class="col-sm-6"><button class="btn btn-primary btn-block text-white btn-user" type="button">Cargar stock</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
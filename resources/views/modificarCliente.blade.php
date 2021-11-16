@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Modificar cliente</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Cliente</h6>
            </div>
        </div>
    </div>
    <div class="card-body d-xl-flex justify-content-xl-center">
        <div class="col-lg-7">
            <div class="p-5">
                <form class="user">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Nombre" name="first_name"></div>
                        <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Apellido" name="last_name"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <!-- Start: #adress --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="DNI" name="dni">
                            <!-- End: #adress -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Start: #phone --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Teléfono" name="phone">
                            <!-- End: #phone -->
                        </div>
                    </div>
                    <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mail" name="email"></div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Localidad" name="localidad"></div>
                        <div class="col-sm-6">
                            <!-- Start: #nickname --><input class="form-control form-control-user" type="text" id="exampleFirstName-1" placeholder="Dirección" name="direccion">
                            <!-- End: #nickname -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0"><button class="btn btn-primary btn-block text-white btn-user" type="button" style="background-color: rgb(223,78,104);">Cancelar</button></div>
                        <div class="col-sm-6"><button class="btn btn-primary btn-block text-white btn-user" type="button">Guardar cambios</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

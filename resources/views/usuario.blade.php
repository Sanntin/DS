@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 18px;">
            <h3 class="text-dark mb-4">Usuario</h3>
            <div class="card shadow">
                <div class="card-body d-xl-flex justify-content-xl-center">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Bienvenido, @nombreusuario</h4>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Nombre" name="first_name"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Apellido" name="last_name"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- Start: #adress --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Dirección" name="adress">
                                        <!-- End: #adress -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Start: #phone --><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Teléfono" name="phone">
                                        <!-- End: #phone -->
                                    </div>
                                </div>
                                <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mail" name="email"></div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Contraseña" name="password"></div>
                                    <div class="col-sm-6">
                                        <!-- Start: #nickname --><input class="form-control form-control-user" type="text" id="exampleFirstName-1" placeholder="Nickname" name="nickname">
                                        <!-- End: #nickname -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background-color: rgb(223,78,104);">Borrar usuario</button></div>
                                    <div class="col-sm-6"><button class="btn btn-primary btn-block text-white btn-user" type="submit">Guardar cambios</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
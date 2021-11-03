@extends('layouts.app')

@section('content')
<body class="bg-gradient-primary">
    <div class="container" style="margin-top: 150px;">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/mecanico2.jpg&quot;);background-position: center;background-size: cover;"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Cree su cuenta!</h4>
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
                                </div><button class="btn btn-primary btn-block text-white btn-user" onclick="swal('Register!');">Registrar usuario</button>
                                <hr>
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"><a class="small" href="login">Ya tiene una cuenta? Ingrese aquí!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
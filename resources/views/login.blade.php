@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - InfoMec</title>
    
</head>

<body class="bg-gradient-primary">
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/mecanico.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Bienvenido devuelta!</h4>
                                    </div>
                                    <form class="user">
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nickname" name="email"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Contraseña" name="password"></div>
                                        <div class="form-group d-flex justify-content-center"><button onclick="swal('Login!');" class="btn btn-primary" type="button" style="width: 50%;">Acceder</button></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div>
                                        <hr>
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"><a class="small" href="register">Cree una cuenta!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection

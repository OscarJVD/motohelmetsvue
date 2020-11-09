<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moto Helmets CO | Iniciar Sesión</title>
    <link href="{{ url('css\admin\styles.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    <script data-search-pseudo-elements="" defer=""
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body style="background-image: url({{url('img/fondo.jpg')}}); background-size:cover; background-repeat:no-repeat;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header d-flex justify-content-center"><img
                                        src="{{ url('L-moto-helment-large.png')}}" alt=""></div>
                                <div class="card-body">
                                    <!-- Registration form-->
                                    <form method="POST" action="{{ route('register') }}">
                                        <!-- Form Row-->
                                        <div class="form">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Nombre de Usuario</label>
                                                <input class="form-control py-4 @error('name') is-invalid @enderror"
                                                    id="inputFirstName" type="text" name="name"
                                                    value="{{ old('name') }}"
                                                    placeholder="Ingrese su nombre de Usuario">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)            -->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Correo</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email"
                                                aria-describedby="emailHelp"
                                                placeholder="Ingrese su correo electronico">
                                        </div>
                                        <!-- Form Row    -->
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <!-- Form Group (password)-->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Contraseña</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password" placeholder="Ingrese su Contraseña ">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (confirm password)-->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirmar
                                                        Contraseña</label>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password" placeholder="Confirmar Contraseña">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Group (create account submit)-->
                                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
                                                type="submit">Crear Cuenta</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{route('login')}}">Tienes una Cuenta? Inicia Sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-light text-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Todos los derechos reservads &#xA9; Moto Helmets CO 2020</div>
                        <div class="col-md-6 text-md-right small">
                            <a href="#!">Politica de Privacidad</a>
                            &#xB7;
                            <a href="#!">Terminos &amp; Condiciones</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js\scripts.js"></script>

    <script src="js\sb-customizer.js"></script>
    <sb-customizer project="sb-admin-pro"></sb-customizer>
</body>

</html>
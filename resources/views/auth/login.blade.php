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
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center"><img
                                        src="{{ url('L-moto-helment-large.png')}}" alt=""></div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Form Group (email address)-->
                                        <div class="form-group">
                                            <label class="small mb-1">Correo</label>
                                            <input class="form-control py-4 @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" name="email" type="email"
                                                placeholder="Ingrese su Correo" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="form-group">
                                            <label class="small mb-1">Password</label>
                                            <input class="form-control py-4 @error('password') is-invalid @enderror"
                                                name="password" type="password" placeholder="Ingrese su contraseña"
                                                required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- Form Group (remember password checkbox)-->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck"
                                                    type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="rememberPasswordCheck">Recuerdame</label>
                                            </div>
                                        </div>
                                        <!-- Form Group (login box)-->
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">Olvidaste tu
                                                Contraseña?</a>
                                            @endif
                                            <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{route('register')}}">Necesitas una cuenta?
                                            Registrate!</a></div>
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
    <script src="{{url('js\admin\scripts.js')}}"></script>

    <script src="{{ url('js\admin\sb-customizer.js')}}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moto Helmets CO - @yield('title')</title>
    <link href="{{ url('css\admin\styles.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    <script data-search-pseudo-elements="" defer=""
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>
<body class="nav-fixed">
    @include('layouts.admin.admin_header')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.admin.admin_siderbar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @if (session('info'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('info')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </ul>
                    </div>
                @endif
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        @yield('title')
                                    </h1>
                                </div>
                                <div class="pt-3">
                                    @yield('create')
                                </div>
                                
                            </div>
                                    <ol class="breadcrumb mb-0 mt-4">
                                        <li class="breadcrumb-item"><a href="">Inicio</a></li>
                                        {{-- <li class="breadcrumb-item active">Breadcrumbs</li> --}}
                                        @yield('breadcrumb')
                                    </ol>
                        </div>
                    </div>
                </header>
                
                @yield('content')
            </main>
            @include('layouts.admin.admin_footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('js\admin\scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('assets\admin\demo\chart-area-demo.js') }}"></script>
    <script src="{{ url('assets\admin\demo\chart-bar-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('assets\admin\demo\datatables-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('assets\admin\demo\date-range-picker-demo.js') }}"></script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
</head>

<body>
    <main class="@yield('classMain') d-flex justify-content-center align-items-center min-vh-100 position-relative"
        style="background-image: url('{{ asset('icon/payroll2.png') }}'); background-size: cover; background-position: center;">

        <div class="overlay"></div> <!-- Capa de superposición -->
        <div class="col-md-6" style="position: relative; z-index: 2;">
            <div class="card" style="background-color: rgba(255, 255, 255, 0.8);">
                @yield('content')
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    @yield('js')
</body>

</html>

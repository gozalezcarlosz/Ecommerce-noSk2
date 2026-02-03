<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href=" {{ $bootstrap_css }} " rel="stylesheet" integrity=" {{ $bootstrap_integrity_css }}" crossorigin="anonymous">
    <title>WebSite</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary my-4" >
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin') }}">Welcome</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ ('login') }}"> {{ __('Login') }} </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src=" {{ $bootstrap_js }} " integrity="{{ $bootstrap_integrity_js }}" crossorigin="anonymous"></script>
</body>
</html>
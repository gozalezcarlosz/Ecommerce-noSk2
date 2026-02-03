<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href=" {{ $bootstrap_css }} " rel="stylesheet" integrity=" {{ $bootstrap_integrity_css }}" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>
<body>

    @yield('content')


   <script src=" {{ $bootstrap_js }} " integrity="{{ $bootstrap_integrity_js }}" crossorigin="anonymous"></script>
</body>

</html>
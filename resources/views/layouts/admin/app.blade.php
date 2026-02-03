
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href=" {{ $bootstrap_css }} " rel="stylesheet" integrity=" {{ $bootstrap_integrity_css }}" crossorigin="anonymous">
    <title> {{ $title }}</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4" >
        <div class="container-fluid">
            <a class="navbar-brand nav-tabs" href="{{ route('admin') }}">Admin</a>
            <button class="navbar-toggler nav-item" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"> # </a>
                </li>

                 {{-- Perfil setcion --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">{{ __('Profile') }}</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">{{ __('See')}} {{__('Profile') }} </a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit')}} {{__('Profile') }}</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">{{ __('Logout') }}</button>
                        </form>
                    </li>
                    </ul>
                </li>
                    {{-- Fin perfil section --}}
                
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users') }}">{{ __('Users') }} </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                
            </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src=" {{ $bootstrap_js }} " integrity="{{ $bootstrap_integrity_js }}" crossorigin="anonymous"></script>
</body>
</html>
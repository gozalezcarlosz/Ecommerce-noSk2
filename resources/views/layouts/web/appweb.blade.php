<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href=" {{ $bootstrap_css }} " rel="stylesheet" integrity=" {{ $bootstrap_integrity_css }}" crossorigin="anonymous">
    <title class="text-capitalize">{{ $title }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4" >
        <div class="container-fluid">
            <a class="navbar-brand nav-tabs text-capitalize" href="">{{ $title }}</a>
            <button class="navbar-toggler nav-item" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"> # </a>
                </li>
                
                {{-- Perfil setcion --}}

                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">{{ __('Profile') }}</a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">{{ __('See')}} {{__('Profile') }} </a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit.view') }}">{{ __('Edit')}} {{__('Profile') }}</a></li>
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
                            
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
                
                {{-- Fin perfil section --}}


                {{--- Dashboaard ---}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>


                {{--- Carrito Compras ---}}
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Shopping Cart') }} </a>
                </li>

                
            </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src=" {{ $bootstrap_js }} " integrity="{{ $bootstrap_integrity_js }}" crossorigin="anonymous"></script>
</body>
</html>
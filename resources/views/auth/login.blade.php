@extends('layouts.web.auth')

@section('content')
<div class="container  mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            
            <div class="card text-center bg-secondary-subtle">
                {{-- <nav>
                    <div class="nav nav-tabs">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                    </div>
                </nav> --}}
                

                {{--- Titulos Del Auth (Login - Register) ---}}
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="#" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> {{ __('Login') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('register') }} " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> {{ __('Register') }} </a>
                    </li>
                    </ul>
                </div>
                
                
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        
                        {{--- Content Login ---}}
                        
                        <div class="card-header"> 
                            {{ __('Login') }} 
                        </div>
    
                        <div class="card-body">
                            <form method="POST" action="{{ route('auth.post') }}">
                                @csrf
    
                                <div class="form-group row my-1">
                                    <label for="email" class="col-md-4 col-form-label text-md-right blod">{{ __('E-Mail Address') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email@email.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row my-1">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
    
                                </div>
    
                                <div class="form-group row mb-0 mt-2">
                                    <div class="col-md-5 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Login') }}
                                        </button>
    
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        {{--- End Content Login ---}}


                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

                        {{--- Content Register ---}}
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf

                                <div class="form-group row my-1">
                                    <label for="name" class="col-md-4 col-form-label text-md-right blod">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Nombre" required autofocus>

                                    </div>
                                </div>

                                <div class="form-group row my-1">
                                    <label for="email" class="col-md-4 col-form-label text-md-right blod">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email@email.com" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row my-1">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                </div>

                                <div class="form-group row mb-0 mt-2">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{--- End Content Register ---}}
                    </div>
                
                </div>


                </div>


        </div>
    </div>
</div>
@endsection

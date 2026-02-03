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
                

                {{--- Titulos Del Edit (Password - Profile) ---}}
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">  {{ __('Edit Profile') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Edit {{ __('Password') }} </a>
                    </li>
                    
                    </ul>
                </div>
                
                
                <div class="tab-content" id="nav-tabContent">

                     {{--- Content Edit Profile ---}}
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="1">

                        <div class="card-header">{{ __('Edit Profile') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.edit') }}">
                                @csrf

                                <div class="form-group row my-1">
                                    <label for="name" class="col-md-4 col-form-label text-md-right blod">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name', Auth::user()->name) }}" required autofocus>

                                    </div>
                                </div>

                                <div class="form-group row my-1">
                                    <label for="email" class="col-md-4 col-form-label text-md-right blod">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email@email.com" value="{{ old('email', Auth::user()->email) }}" required autocomplete="email">

                                    </div>
                                </div>

                                <div class="form-group row my-3 mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Save Changes') }}
                                        </button>
                                    </div>
                                </div>

                                

                            </form>
                        </div>
                    </div>
                    {{--- End Content Edit Profile ---}}

                    {{--- Content Edit Password ---}}
                     <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        
                        
                        <div class="card-header"> 
                           Edit {{ __('Password') }} 
                        </div>
    
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.edit.password') }}">
                                @csrf
    
                                {{-- Password --}}
                                <div class="form-group row my-1">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required >

                                    </div>
                                </div>

                                 <div class="form-group row my-3 mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Save Changes') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        
                    </div>
                    {{--- End Content Edit Password ---}}


                    
                   

                
                </div>


                </div>


        </div>
    </div>
</div>
@endsection

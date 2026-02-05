@extends('layouts.admin.app')

@section('content')

<!-- Formulario para agregar usuario -->
    <div class="card my-4">
        <h3 class="card-header ">{{ $title }} </h3>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.users.create') }}" method="POST">
                @csrf
                <div class="col-md-2">
                    <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                </div>
                <div class="col-md-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                 <div class="col-md-2">
                    <input type="password" class="form-control" name="password" placeholder="{{ __('Password')}}" required>
                </div>
                <div class="col-md-2">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password')}}" required>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="role">
                        <option selected>Rol...</option>
                        <option>Admin</option>
                        <option>Usuario</option>

                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-success w-100">+</button>
                </div>
            </form>
        </div>
    </div>

@endsection
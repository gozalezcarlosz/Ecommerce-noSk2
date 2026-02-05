@extends('layouts.admin.app')

@section('content')



<div class="container mt-5">
    
    {{-- Index Show --}}
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 90%;">
            <div class="card-header text-align-center">
                <h2 class="mb-4 d-inline">{{ $title }}</h2>
            
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary mt-2 float-end"><i class="bi bi-plus-circle-fill"></i>  {{ __('Create User') ?? 'Crear Usuario' }}</a>
            
                <br><br>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider ">

                        @foreach ($users as $user )
                        
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                <td>
                                    
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-outline-primary btn-sm inline"><i class="bi bi-eye-fill"></i> {{ __('See') }}</a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm inline"><i class="bi bi-pencil-fill"></i> {{ __('Edit') }}</a>
                                    <form class="d-inline" action=" {{ url('admin/users/'. $user->id) }} " method="POST">
                                        @csrf  
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"> <i class="bi bi-trash-fill"></i> {{ __('Delete') }}</button>

                                    </form>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Listado de tarjetas de usuarios -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Usuario 1 -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Juan Pérez</h5>
                    <p class="card-text text-muted">juan@example.com</p>
                    <span class="badge bg-primary">Admin</span>
                </div>
                <div class="card-footer bg-transparent">
                    <button class="btn btn-sm btn-outline-primary">Editar</button>
                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </div>
            </div>
        </div>
        <!-- Usuario 2 -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">María García</h5>
                    <p class="card-text text-muted">maria@example.com</p>
                    <span class="badge bg-secondary">Usuario</span>
                </div>
                <div class="card-footer bg-transparent">
                    <button class="btn btn-sm btn-outline-primary">Editar</button>
                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </div>
            </div>
        </div>
        <!-- Agregar más tarjetas aquí -->
    </div>
</div>


@endsection

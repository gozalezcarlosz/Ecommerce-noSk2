@extends('layouts.admin.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 50%;">
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
                                    
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm inline"><i class="bi bi-pencil"></i>{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm inline"><i class="bi bi-eye"></i>{{ __('See') }}</a>
                                    <form class="form-group" action=" {{ url('admin/users/'. $user->id) }} " method="POST">
                                        @csrf  
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm inline"> <i class="bi bi-trash"></i> {{ __('Delete') }}</button>

                                    </form>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
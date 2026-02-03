@extends('layouts.admin.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        @foreach ($users as $user )
                        
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm">{{ __('Delete') }}</a>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.web.appweb')

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
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                        </tr>
                    </tbody>
                </table>
                @if ($success)
                    <div class="alert alert-success" role="alert">
                        {{ $success }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@extends(auth()->user()->hasRole('admin') ? 'layouts.admin.app' : 'layouts.web.appweb')

@section('content')

    Dashboard Page

@endsection
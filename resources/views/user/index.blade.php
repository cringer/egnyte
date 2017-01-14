@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Users</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Hostname</th>
                        <th>Created At</th>
                        <th>Updated At</th>                        
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->hostname }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('user.create') }}" class="btn btn-primary" role="button">
                    <i class="fa fa-btn fa-plus"></i> Add New User
                </a>
            </ul>
        </div>
    </div>
</div>
@endsection
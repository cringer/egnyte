@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Statuses</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    @foreach ($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->status }}</td>
                            <td>{{ $status->slug }}</td>
                            <td>{{ $status->created_at }}</td>
                            <td>{{ $status->updated_at }}</td>
                            <td align="center">
                                {!! Form::open(['route' => ['status.destroy', $status->id], 'method' => 'delete']) !!}
                                    <a href="{{ url("status/$status->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                    <a href="{{ url("status/$status->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('status.create') }}" class="btn btn-primary" role="button">
                    <i class="fa fa-btn fa-plus"></i> Add New Status
                </a>
            </ul>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Location</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Site</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->site }}</td>
                        <td>{{ $location->slug }}</td>
                        <td>{{ $location->created_at }}</td>
                        <td>{{ $location->updated_at }}</td>
                        <td align="center">
                            {!! Form::open(['route' => ['location.destroy', $location->id], 'method' => 'delete']) !!}
                                <a href="{{ url("location/$location->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                <a href="{{ url("location/$location->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

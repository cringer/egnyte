@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Locations</h3>

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
                    @foreach ($locations as $location)
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
                    @endforeach
                </table>
                <a href="{{ route('location.create') }}" class="btn btn-primary" role="button">
                    <i class="fa fa-btn fa-plus"></i> Add New Location
                </a>
            </ul>
        </div>
    </div>
</div>
@endsection

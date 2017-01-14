@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Task List</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ $tasklist->id }}</td>
                        <td>{{ $tasklist->name }}</td>
                        <td><i class="fa fa-btn fa-{{ $tasklist->icon }}"></td>
                        <td>{{ $tasklist->created_at }}</td>
                        <td>{{ $tasklist->updated_at }}</td>
                        <td align="center">
                            {!! Form::open(['route' => ['tasklist.destroy', $tasklist->id], 'method' => 'delete']) !!}
                                <a href="{{ url("tasklist/$tasklist->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                <a href="{{ url("tasklist/$tasklist->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </table>
            </ul>

            <h3>Positions Assigned to Task List</h3>
            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Color</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    @foreach ($tasklist->positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->title }}</td>
                        <td>{{ $position->slug }}</td>
                        <td>{{ $position->color }}</td>
                        <td>{{ $position->created_at }}</td>
                        <td>{{ $position->updated_at }}</td>
                        <td align="center">
                            {!! Form::open(['route' => ['position.destroy', $position->id], 'method' => 'delete']) !!}
                                <a href="{{ url("position/$position->id") }}"><i class="fa fa-btn fa-eye"></i></a>&nbsp;
                                <a href="{{ url("position/$position->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                <a href="{{ url("position/$position->id") }}"><i class="fa fa-btn fa-trash"></i></a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

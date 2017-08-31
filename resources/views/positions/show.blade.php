@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Position</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Acronym</th>
                        <th>Color</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->name }}</td>
                        <td>{{ $position->acronym }}</td>
                        <td>{{ $position->color }}</td>
                        <td>{{ $position->created_at }}</td>
                        <td>{{ $position->updated_at }}</td>
                        <td align="center">
                            {!! Form::open(['route' => ['positions.destroy', $position->id], 'method' => 'delete']) !!}
                                <a href="{{ url("position/$position->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                <a href="{{ url("position/$position->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </table>
            </ul>
            <h3>Task Lists</h3>
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
                    @foreach ($position->task_lists as $tasklist)
                    <tr>
                        <td>{{ $tasklist->id }}</td>
                        <td>{{ $tasklist->name }}</td>
                        <td><i class="fa fa-{{ $tasklist->icon }}" aria-hidden="true"></i></td>
                        <td>{{ $tasklist->created_at }}</td>
                        <td>{{ $tasklist->updated_at }}</td>
                        <td align="center">
                            {!! Form::open(['route' => ['tasklists.destroy', $tasklists->id], 'method' => 'delete']) !!}
                                <a href="{{ url("tasklist/$tasklist->id") }}"><i class="fa fa-btn fa-eye"></i></a>&nbsp;
                                <a href="{{ url("tasklist/$tasklist->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                <a href="{{ url("tasklist/$tasklist->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
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

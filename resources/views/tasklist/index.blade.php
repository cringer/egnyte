@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Task Lists</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Task Group</th>
                        <th>Notify Group</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    @foreach ($tasklists as $tasklist)
                        <tr>
                            <td>{{ $tasklist->id }}</td>
                            <td>{{ $tasklist->name }}</td>
                            <td>{{ $tasklist->icon }}</td>
                            <td>{{ $tasklist->task_group->name }}</td>
                            <td>{{ $tasklist->notify_group ?: 'null'}}</td>
                            <td>{{ $tasklist->created_at }}</td>
                            <td>{{ $tasklist->updated_at }}</td>
                            <td align="center">
                                {!! Form::open(['route' => ['tasklist.destroy', $tasklist->id], 'method' => 'delete']) !!}
                                    <a href="{{ url("tasklist/$tasklist->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                    <a href="{{ url("tasklist/$tasklist->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('tasklist.create') }}" class="btn btn-primary" role="button">
                    <i class="fa fa-btn fa-plus"></i> Add New Task
                </a>
            </ul>
        </div>
    </div>
</div>
@endsection

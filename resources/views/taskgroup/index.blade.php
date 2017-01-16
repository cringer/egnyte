@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Task Groups</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Task Group Name</th>
                        <th>Assigned Position</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    @foreach ($taskgroups as $taskgroup)
                        <tr>
                            <td>{{ $taskgroup->id }}</td>
                            <td>{{ $taskgroup->name }}</td>
                            <td>{{ $taskgroup->position->title }}</td>
                            <td>{{ $taskgroup->created_at }}</td>
                            <td>{{ $taskgroup->updated_at }}</td>
                            <td align="center">
                                {!! Form::open(['route' => ['taskgroup.destroy', $taskgroup->id], 'method' => 'delete']) !!}
                                    <a href="{{ url("taskgroup/$taskgroup->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                    <a href="{{ url("taskgroup/$taskgroup->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('taskgroup.create') }}" class="btn btn-primary" role="button">
                    <i class="fa fa-btn fa-plus"></i> Add New Task
                </a>
            </ul>
        </div>
    </div>
</div>
@endsection

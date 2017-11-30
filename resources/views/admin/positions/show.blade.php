@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Position</h1>

    <div class="panel panel-default">
        <div class="panel panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
							<th>Name</th>
							<th>Acronym</th>
							<th>Color</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $position['name'] }}</td>
                            <td>{{ $position['acronym'] }}</td>
                            <td><span class="badge" style="background-color: {{ $position['color'] }}">{{ $position['color'] }}</span></td>
                            <td>{{ $position['created_at'] }}</td>
                            <td>{{ $position['updated_at'] }}</td>
                            <td>
                                <a href="{{ route('positions.edit', ['id' => $position['id']]) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Task Lists</h3>

    <div class="panel panel-default">
        <div class="panel panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
							<th>Name</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($position->tasklists as $tasklist)
                            <td>{{ $tasklist->name }}</td>
                            <td>{{ $tasklist->created_at }}</td>
                            <td>{{ $tasklist->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.tasklists.show', ['id' => $tasklist->id]) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button @click="handleDelete(tasklist.id, index)" class="btn btn-xs btn-default">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

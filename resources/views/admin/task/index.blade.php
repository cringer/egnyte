@extends('admin.layout')

@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Tasks</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('task.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Task
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="task_lists" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Task List</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tasks as $task)
						<tr>
							<td>{{ $task->id }}</td>
							<td>{{ $task->name }}</td>
							<td>
								@foreach ($task->tasklists as $tasklist)
									{{ $tasklist->name }}
								@endforeach
							</td>
							<td>{{ $task->created_at }}</td>
							<td>{{ $task->updated_at }}</td>
							<td>
								<a href="{{ route('task.show', ['task' => $task->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('task.destroy', ['task' => $task->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-trash"></i> Delete
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>    
@endsection
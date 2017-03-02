@extends('admin.layout')

@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Task Lists</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('tasklist.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Task List
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="task_lists" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Icon</th>
							<th>Position</th>
							<th>User</th>
							<th>Notify Group</th>
							<th>Created</th>
							<th>Modified</th>
							<th>&nbsp</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tasklists as $tasklist)
						<tr>
							<td>{{ $tasklist->id }}</td>
							<td>{{ $tasklist->name }}</td>
							<td>{{ $tasklist->icon }}</td>
							<td>{{ $tasklist->position->name }}</td>
							<td>{{ $tasklist->user->name }}</td>
							<td>Notify</td>
							<td>{{ $tasklist->created_at</td>
							<td>{{ $tasklist->modified_at</td>
							<td>2</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>    
@endsection
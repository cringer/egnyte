@extends('admin.layout')

@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Assignment</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.assignment.create') }}" class="btn btn-primary{{ ! $unassigned ? ' disabled' : '' }}">
    			<i class="fa fa-plus"></i> Add Assignment
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="task_lists" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>New Hire</th>
							<th>Method</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($assignments as $assignment)
						<tr>
							<td>{{ $assignment->id }}</td>
							<td>{{ $assignment->newhire->name }}</td>
							<td>{{ $assignment->method->name }}</td>							
							<td>{{ $assignment->created_at }}</td>
							<td>{{ $assignment->updated_at }}</td>
							<td>
								<a href="{{ route('admin.assignment.edit', ['assignment' => $assignment->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('admin.assignment.destroy', ['assignment' => $assignment->id]) }}" class="btn btn-xs btn-default">
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
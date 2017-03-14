@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Roles</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.role.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Role
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="roles" class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Permissions</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($roles as $role)
						<tr>
							<td>{{ $role->name }}</td>
							<td>
								@foreach ($role->permissions as $permission)
									{{ $permission->name }}
								@endforeach
							</td>
							<td>
								<a href="{{ route('admin.role.show', ['role' => $role->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('admin.role.destroy', ['role' => $role->id]) }}" class="btn btn-xs btn-default">
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

@section('footer_scripts')
<script src="https://cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#roles').DataTable();
    });
</script>
@endsection
@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Permissions</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('permission.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Permission
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="permissions" class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Roles that have this permission</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($permissions as $permission)
						<tr>
							<td>{{ $permission->name }}</td>
							<td>
								@foreach ($permission->roles as $role)
									{{ $role->name }}
								@endforeach
							</td>
							<td>
								<a href="{{ route('permission.show', ['permission' => $permission->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('permission.destroy', ['permission' => $permission->id]) }}" class="btn btn-xs btn-default">
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
        $('#permissions').DataTable();
    });
</script>
@endsection

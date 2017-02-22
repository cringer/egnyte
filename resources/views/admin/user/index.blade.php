@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Users</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('user.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add User
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="users" class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Hostname</th>
							<th>Roles</th>
							<th>Extra Permissions</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->hostname }}</td>
							<td>
								@foreach ($user->roles as $role)
									{{ $role->name }}
								@endforeach
							</td>
							<td>
								@foreach ($user->permissions as $permission)
									{{ $permission->name }}
								@endforeach
							</td>
							<td>
								<a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('user.destroy', ['user' => $user->id]) }}" class="btn btn-xs btn-default">
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
        $('#users').DataTable();
    });
</script>
@endsection

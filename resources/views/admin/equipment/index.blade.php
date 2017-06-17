@extends('admin.layout')

@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Equipment</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.equipment.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Equipment
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="equipment" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Vendor</th>
							<th>Type</th>
							<th>Name</th>
							<th>Description</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($equipment as $equip)
						<tr>
							<td>{{ $equip->id }}</td>
							<td>{{ $equip->vendor->name }}</td>
							<td>{{ $equip->equipmentType->name }}</td>
							<td>{{ $equip->name }}</td>
							<td>{{ $equip->description }}</td>
							<td>{{ $equip->created_at }}</td>
							<td>{{ $equip->updated_at }}</td>
							<td>&nbsp;
								<a href="{{ route('admin.equipment.show', ['equipment' => $equip->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('admin.equipment.destroy', ['equipment' => $equip->id]) }}" class="btn btn-xs btn-default">
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
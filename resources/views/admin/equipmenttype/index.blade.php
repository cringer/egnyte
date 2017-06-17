@extends('admin.layout')

@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Equipment Types</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.equipmenttype.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Equipment Type
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="equipmenttypes" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($equipmentTypes as $type)
						<tr>
							<td>{{ $type->id }}</td>
							<td>{{ $type->name }}</td>
							<td>{{ $type->created_at }}</td>
							<td>{{ $type->updated_at }}</td>
							<td>
								<a href="{{ route('admin.equipmenttype.show', ['equipmenttype' => $type->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('admin.equipmenttype.destroy', ['equipmenttype' => $type->id]) }}" class="btn btn-xs btn-default">
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
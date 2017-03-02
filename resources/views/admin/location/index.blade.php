@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Locations</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('location.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Location
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="locations" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Created</th>
							<th>Updated</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($locations as $location)
						<tr>
							<td>{{ $location->id }}</td>
							<td>{{ $location->name }}</td>
							<td>{{ $location->created_at }}</td>
							<td>{{ $location->updated_at }}</td>
							<td>
								<a href="{{ route('location.show', ['location' => $location->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('location.destroy', ['location' => $location->id]) }}" class="btn btn-xs btn-default">
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
        $('#locations').DataTable();
    });
</script>
@endsection

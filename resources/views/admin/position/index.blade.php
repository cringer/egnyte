@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Positions</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('position.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Position
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="positions" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Acronym</th>
							<th>Color</th>
							<th>Created</th>
							<th>Updated</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($positions as $position)
						<tr>
							<td>{{ $position->id }}</td>
							<td>{{ $position->name }}</td>
							<td>{{ $position->acronym }}</td>
							<td>{{ $position->color }}</td>
							<td>{{ $position->created_at }}</td>
							<td>{{ $position->updated_at }}</td>
							<td>
								<a href="{{ route('position.show', ['position' => $position->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('position.destroy', ['position' => $position->id]) }}" class="btn btn-xs btn-default">
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
        $('#positions').DataTable();
    });
</script>
@endsection

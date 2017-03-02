@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Statuses</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('status.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Status
			</a>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
				<table id="statuses" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Acronym</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($statuses as $status)
						<tr>
							<td>{{ $status->id }}</td>
							<td>{{ $status->name }}</td>
							<td>{{ $status->acronym }}</td>
							<td>{{ $status->created_at }}</td>
							<td>{{ $status->updated_at }}</td>
							<td>
								<a href="{{ route('status.show', ['status' => $status->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('status.destroy', ['status' => $status->id]) }}" class="btn btn-xs btn-default">
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
        $('#statuses').DataTable();
    });
</script>
@endsection

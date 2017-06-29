@extends('admin.layout')

@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Vendor Contacts</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.vendorcontact.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Vendor Contact
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="task_lists" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Vendor</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>						
							<th>Created At</th>
							<th>Updated At</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($vendor_contacts as $vc)
						<tr>
							<td>{{ $vc->id }}</td>
							<td>{{ $vc->vendor->name }}</td>
							<td>{{ $vc->name }}</td>
							<td>{{ $vc->email }}</td>
							<td>{{ $vc->phone }}</td>							
							<td>{{ $vc->created_at }}</td>
							<td>{{ $vc->updated_at }}</td>
							<td>
								<a href="{{ route('admin.vendorcontact.edit', ['id' => $vc->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('admin.vendorcontact.destroy', ['id' => $vc->id]) }}" data-method="delete" data-confirm="Are you sure?" data-token="{{ csrf_token() }}" class="btn btn-xs btn-default">
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
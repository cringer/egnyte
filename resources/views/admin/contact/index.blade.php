@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Contacts</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('contact.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Contact
			</a>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
				<table id="contacts" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($contacts as $contact)
						<tr>
							<td>{{ $contact->id }}</td>
							<td>{{ $contact->name }}</td>
							<td>{{ $contact->email }}</td>
							<td>{{ $contact->created_at }}</td>
							<td>{{ $contact->updated_at }}</td>
							<td>
								<a href="{{ route('admin.contact.show', ['contact' => $contact->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('admin.contact.destroy', ['contact' => $contact->id]) }}" class="btn btn-xs btn-default">
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
        $('#contacts').DataTable();
    });
</script>
@endsection

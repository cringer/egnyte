@extends('admin.layout')

@section('content')    
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Notify Groups</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('notifygroup.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Notify Group
			</a>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
				<table id="notifygroups" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Task List</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $notifygroup->id }}</td>
							<td>{{ $notifygroup->name }}</td>
							<td>{{ $notifygroup->task_list->name }}</td>
							<td>{{ $notifygroup->created_at }}</td>
							<td>{{ $notifygroup->updated_at }}</td>
							<td>
								<a href="{{ route('admin.notifygroup.show', ['notifygroup' => $notifygroup->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a @click.prevent="deleteGroup" href="{{ route('admin.notifygroup.destroy', ['notifygroup' => $notifygroup->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-trash"></i> Delete
								</a>
							</td>
						</tr>
					</tbody>
				</table>

				<br />
				<h3>Contacts</h3>
				<table id="contacts_notify_group" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($notifygroup->contacts as $contact)
						<tr>
							<td>{{ $contact->id }}</td>
							<td>{{ $contact->name }}</td>
							<td>{{ $contact->email }}</td>
							<td>{{ $contact->created_at }}</td>
							<td>{{ $contact->updated_at }}</td>
							<td>
								<a href="{{ route('admin.notifygroup.show', ['notifygroup' => $notifygroup->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a @click.prevent="deleteGroup" href="{{ route('admin.notifygroup.destroy', ['notifygroup' => $notifygroup->id]) }}" class="btn btn-xs btn-default">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.1/vue.min.js" integrity="sha256-+lq3KPqEFQg/58sDzkrt3VflAlGyJF2MZgOObJkUF2M=" crossorigin="anonymous"></script>
<script>
	new Vue({
		el: '#notifygroups',

		data: {},

		methods: {

		}
	});
</script>
@endsection

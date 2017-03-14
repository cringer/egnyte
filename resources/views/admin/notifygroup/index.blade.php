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
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($notifygroups as $notifygroup)
						<tr>
							<td>{{ $notifygroup->id }}</td>
							<td>{{ $notifygroup->name }}</td>
							<td>{{ $notifygroup->task_list->name }}</td>
							<td>{{ $notifygroup->created_at }}</td>
							<td>{{ $notifygroup->updated_at }}</td>
							<td>
								<a href="{{ route('notifygroup.show', ['notifygroup' => $notifygroup->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a @click.prevent="deleteGroup" href="{{ route('notifygroup.destroy', ['notifygroup' => $notifygroup->id]) }}" class="btn btn-xs btn-default">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.1/vue.min.js" integrity="sha256-+lq3KPqEFQg/58sDzkrt3VflAlGyJF2MZgOObJkUF2M=" crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
        $('#notifygroups').DataTable();
    });
</script>
<script>
	new Vue({
		el: '#notifygroups',

		data: {},

		methods: {
			deleteGroup() {
            	alert('deleting');
            }
		}
	});
</script>
@endsection
@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Assignment Methods</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.assignmentmethods.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Assignment Method
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Description</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="method in assignmentMethods">
							<td v-text="method.id"></td>
							<td v-text="method.name"></td>
							<td v-text="method.description"></td>
							<td v-text="method.created_at"></td>
							<td v-text="method.updated_at"></td>
                            <td>
                                <a :href="'/admin/assignmentmethods/' + method.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button @click="handleDelete(method.id)" class="btn btn-xs btn-default">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer_scripts')
<script>
    $(document).ready( function () {
        new Vue({
            el: '#app',
            data: {
                assignmentMethods: [],
            },
            methods: {
                handleDelete(target) {
                    axios.delete(route('api.assignmentmethods.destroy', target))
                        .then(response => this.getAssignmentMethods());
                },
                getAssignmentMethods() {
                    axios.get(route('api.assignmentmethods.index'))
                        .then(response => this.assignmentMethods = response.data);
                }

            },
            created() {
                this.getAssignmentMethods();
            }
        });
    });
</script>
@stop

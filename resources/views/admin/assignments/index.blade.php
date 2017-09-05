@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Assignment</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.assignments.create') }}" class="btn btn-primary{{ ! $unassigned ? ' disabled' : '' }}">
    			<i class="fa fa-plus"></i> Add Assignment
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>New Hire</th>
							<th>Method</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(assignment, index) in assignments">
							<td v-text="assignment.id"></td>
							<td v-text="assignment.newhire.name"></td>
							<td v-text="assignment.method.name"></td>
							<td v-text="assignment.created_at"></td>
							<td v-text="assignment.updated_at"></td>
                            <td>
                                <a :href="'/admin/assignments/' + assignment.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button @click="handleDelete(assignment.id, index)" class="btn btn-xs btn-default">
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
                assignments: [],
            },
            methods: {
                handleDelete(target, index) {
                    axios.delete(route('api.assignments.destroy', target))
                        .then(response => this.assignments.splice(index, 1))
                },
                getAssignments() {
                    axios.get(route('api.assignments.index'))
                        .then(response => this.assignments = response.data);
                }

            },
            created() {
                this.getAssignments();
            }
        });
    });
</script>
@stop

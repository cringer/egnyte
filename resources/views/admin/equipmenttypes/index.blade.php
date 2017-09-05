@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Equipment Types</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.equipmenttypes.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Equipment Type
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
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
						<tr v-for="(type, index) in equipmentTypes">
							<td v-text="type.id"></td>
							<td v-text="type.name"></td>
							<td v-text="type.created_at"></td>
							<td v-text="type.updated_at"></td>
                            <td>
                                <a :href="'/admin/equipmenttypes/' + type.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button @click="handleDelete(type.id, index)" class="btn btn-xs btn-default">
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
                equipmentTypes: [],
            },
            methods: {
                handleDelete(target, index) {
                    axios.delete(route('api.equipmenttypes.destroy', target))
                        .then(response => this.equipmentTypes.splice(index, 1))
                },
                getEquipmentTypes() {
                    axios.get(route('api.equipmenttypes.index'))
                        .then(response => this.equipmentTypes = response.data);
                }

            },
            created() {
                this.getEquipmentTypes();
            }
        });
    });
</script>
@stop

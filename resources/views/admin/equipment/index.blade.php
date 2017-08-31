@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Equipment</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.equipment.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Equipment
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="equipment" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Vendor</th>
							<th>Type</th>
							<th>Name</th>
							<th>Description</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="equip in equipment">
							<td v-text="equip.id"></td>
							<td v-text="equip.vendor.name"></td>
							<td v-text="equip.equipment_type.name"></td>
							<td v-text="equip.name"></td>
							<td v-text="equip.description"></td>
							<td v-text="equip.created_at"></td>
							<td v-text="equip.updated_at"></td>
							<td>
                                <a :href="'/admin/equipment/' + equip.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button :data-id="equip.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
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
            el: '#equipment',
            data: {
                equipment: [],
            },
            methods: {
                handleDelete(target) {
                    axios.delete(route('api.equipment.destroy', target))
                        .then(response => this.getEquipment());
                },
                getEquipment() {
                    axios.get(route('api.equipment.index'))
                        .then(response => this.equipment = response.data);
                }

            },
            created() {
                this.getEquipment();
            }
        });
    });
</script>
@stop

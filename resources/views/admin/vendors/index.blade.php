@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Vendors</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.vendors.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Vendor
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="vendors" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Account Number</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="vendor in vendors">
							<td v-text="vendor.id"></td>
							<td v-text="vendor.name"></td>
							<td v-text="vendor.account_number"></td>
							<td v-text="vendor.created_at"></td>
							<td v-text="vendor.updated_at"></td>
							<td>
                                <a :href="'/admin/vendors/' + vendor.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button :data-id="vendor.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
                                    <i class="fa fa-trash"></i> Delete
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
            el: '#vendors',
            data: {
                vendors: [],
            },
            methods: {
                handleDelete(target) {
                    axios.delete(route('api.vendors.destroy', target))
                        .then(response => this.getVendors());
                },
                getVendors() {
                    axios.get(route('api.vendors.index'))
                        .then(response => this.vendors = response.data);
                }

            },
            created() {
                this.getVendors();
            }
        });
    });
</script>
@stop

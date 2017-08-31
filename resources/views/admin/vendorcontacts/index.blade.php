@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Vendor Contacts</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.vendorcontacts.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Vendor Contact
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="vc" class="table table-striped">
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
						<tr v-for="vc in vendorContacts">
							<td v-text="vc.id"></td>
							<td v-text="vc.vendor.name"></td>
							<td v-text="vc.name"></td>
							<td v-text="vc.email"></td>
							<td v-text="vc.phone"></td>
							<td v-text="vc.created_at"></td>
							<td v-text="vc.updated_at"></td>
							<td>
								<a :href="'/admin/vendorcontacts/' + vc.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button :data-id="vc.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
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
            el: '#vc',
            data: {
                vendorContacts: [],
            },
            methods: {
                handleDelete(target) {
                    axios.delete(route('api.vendorcontacts.destroy', target))
                        .then(response => this.getVendorContacts());
                },
                getVendorContacts() {
                    axios.get(route('api.vendorcontacts.index'))
                        .then(response => this.vendorContacts = response.data);
                }

            },
            created() {
                this.getVendorContacts();
            }
        });
    });
</script>
@stop

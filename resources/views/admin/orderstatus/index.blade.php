@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Order Statuses</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.orderstatus.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Order Status
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="orderstatus" class="table table-striped">
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
						<tr v-for="status in orderStatus">
							<td v-text="status.id"></td>
							<td v-text="status.name"></td>
							<td v-text="status.created_at"></td>
							<td v-text="status.updated_at"></td>
                            <td>
                                <a :href="'/admin/orderstatus/' + status.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button :data-id="status.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
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
            el: '#orderstatus',
            data: {
                orderStatus: [],
            },
            methods: {
                handleDelete(target) {
                    console.log(target)
                    axios.delete(route('api.orderstatus.destroy', target))
                        .then(response => this.getOrderStatus());
                },
                getOrderStatus() {
                    axios.get(route('api.orderstatus.index'))
                        .then(response => this.orderStatus = response.data);
                }

            },
            created() {
                this.getOrderStatus();
            }
        });
    });
</script>
@stop

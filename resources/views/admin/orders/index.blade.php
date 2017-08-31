@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Orders</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Order
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="orders" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Assignment</th>
							<th>Equipment</th>
							<th>Status</th>
							<th>Order Date</th>
							<th>Delivery Date</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="order in orders">
							<td v-text="order.id"></td>
							<td v-text="order.assignment.newhire.name"></td>
							<td v-text="order.equipment.name"></td>
							<td v-text="order.order_status.name"></td>
							<td v-text="order.order_date"></td>
							<td v-text="order.deliver_date"></td>
							<td v-text="order.created_at"></td>
							<td v-text="order.updated_at"></td>
                            <td>
                                <a :href="'/admin/orders/' + order.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button :data-id="order.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
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
            el: '#orders',
            data: {
                orders: [],
            },
            methods: {
                handleDelete(target) {
                    axios.delete(route('api.orders.destroy', target))
                        .then(response => this.getOrders());
                },
                getOrders() {
                    axios.get(route('api.orders.index'))
                        .then(response => this.orders = response.data);
                }

            },
            created() {
                this.getOrders();
            }
        });
    });
</script>
@stop

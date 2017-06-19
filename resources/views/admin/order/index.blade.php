@extends('admin.layout')

@section('content')  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Orders</h1>

    <div class="panel panel-default">
    	<div class="panel-heading">
    		<a href="{{ route('admin.order.create') }}" class="btn btn-primary">
    			<i class="fa fa-plus"></i> Add Order
			</a>
		</div>
    	<div class="panel panel-body">
			<div class="table-responsive">
				<table id="order" class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Assignment</th>
							<th>Status</th>
							<th>Order Date</th>
							<th>Delivery Date</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orders as $order)
						<tr>
							<td>{{ $order->id }}</td>
							<td>Assignment</td>
							<td>Status</td>
							<td>{{ $order->order_date }}</td>
							<td>{{ $order->delivery_date }}</td>
							<td>{{ $order->created_at }}</td>
							<td>{{ $order->updated_at }}</td>
							<td>&nbsp;
								<a href="{{ route('admin.order.show', ['order' => $order->id]) }}" class="btn btn-xs btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
								<a href="{{ route('admin.order.destroy', ['order' => $order->id]) }}" class="btn btn-xs btn-default">
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
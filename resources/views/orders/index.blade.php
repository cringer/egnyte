@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Orders</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Assignment</th>
                        <th>Equipment</th>
                        <th>Equipment Type</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->assignment->newhire->name }}</td>
                            <td>{{ $order->equipment->name }}</td>
                            <td>{{ $order->equipment->equipmentType->name }}</td>
                            <td>{{ $order->order_status->name }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->deliver_date }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

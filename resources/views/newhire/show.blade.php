@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>New Hire</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Assignment</th>
                        <th>Hire Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    <tr>
                        <td>{{ $newhire->id }}</td>
                        <td>{{ $newhire->name }}</td>
                        <td>{{ $newhire->position->name }}</td>
                        <td>
                            @if (count($newhire->assignment))
                                {{ $newhire->assignment->method->name }}
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td>{{ $newhire->hire_date }}</td>
                        <td>{{ $newhire->created_at }}</td>
                        <td>{{ $newhire->updated_at }}</td>
                    </tr>
                </table>
            </ul>

            <h3>Orders</h3>
            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Order Id</th>
                        <th>Equipment</th>
                        <th>Equipment Type</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>

                    @if($newhire->assignment)
                        @if($newhire->assignment->orders)
                            @foreach ($newhire->assignment->orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->equipment->name }}</td>
                                    <td>{{ $order->equipment->equipmentType->name }}</td>
                                    <td>{{ $order->order_status->name }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->deliver_date }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

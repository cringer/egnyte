@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Edit Order</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">
	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Order
		</div>
		<div class="panel panel-body">
			{!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                <div class="form-group{{ $errors->has('assignment_id') ? ' has-error' : '' }}">
                    <label for="assignment_id" class="col-md-4 control-label">Assignment</label>

                    <div class="col-md-6">
                        {!! Form::select('assignment_id', $assignments, null, ['placeholder' => 'Select Assignment...', 'class' => 'form-control']) !!}

                        @if ($errors->has('assignment_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('assignment_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('equipment_id') ? ' has-error' : '' }}">
                    <label for="equipment_id" class="col-md-4 control-label">Equipment</label>

                    <div class="col-md-6">
                        {!! Form::select('equipment_id', $equipment, null, ['placeholder' => 'Select Equipment...', 'class' => 'form-control']) !!}

                        @if ($errors->has('equipment_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('equipment_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('order_status_id') ? ' has-error' : '' }}">
                    <label for="order_statusid" class="col-md-4 control-label">Order Status</label>

                    <div class="col-md-6">
                    {!! Form::select('order_status_id', $statuses, null, ['placeholder' => 'Select Status...', 'class' => 'form-control']) !!}

                        @if ($errors->has('order_status_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('order_status_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('order_date') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Order Date</label>

                    <div class="col-md-6">
                        {!! Form::text('order_date', null, ['id' => 'order_date', 'class' => 'form-control']) !!}

                        @if ($errors->has('order_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('order_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('deliver_date') ? ' has-error' : '' }}">
                    <label for="deliver_date" class="col-md-4 control-label">Delivery Date</label>

                    <div class="col-md-6">
                        {!! Form::text('deliver_date', null, ['id' => 'deliver_date', 'class' => 'form-control']) !!}

                        @if ($errors->has('deliver_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('deliver_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-plus"></i> Update
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
		</div>
	</div>
</div>
@stop

@section('footer_scripts')
<script>
    $( function() {
        $( "#order_date" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
        $( "#deliver_date" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
@stop

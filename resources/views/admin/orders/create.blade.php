@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Order</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">

    <div class="panel panel-default">
        <div class="panel-heading">
            Add a new Order
        </div>

        <div class="panel panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.orders.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('assignment_id') ? ' has-error' : '' }}">
                    <label for="assignment_id" class="col-md-4 control-label">Assignment</label>

                    <div class="col-md-6">
                        <select class="form-control" name="assignment_id">
                            <option selected disabled>Select Assignment...</option>

                            @foreach ($assignments as $assign)
                            <option value="{{ $assign->id }}" {{ old('assignment_id') == $assign->id ? 'selected' : '' }}>
                                {{ $assign->newhire->name }}
                            </option>
                            @endforeach
                        </select>

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
                        <select class="form-control" name="equipment_id">
                            <option selected disabled>Select Equipment...</option>

                            @foreach ($equipment as $equip)
                            <option value="{{ $equip->id }}" {{ old('equipment_id') == $equip->id ? 'selected' : '' }}>
                                {{ $equip->name }}
                            </option>
                            @endforeach
                        </select>

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
                        <select class="form-control" name="order_status_id">
                            <option selected disabled>Select Status...</option>

                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('order_status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                            @endforeach
                        </select>

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
                        <input id="order_date" type="text" class="form-control" name="order_date" value="{{ old('order_date') }}">

                        @if ($errors->has('order_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('order_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('deliver_date') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Delivery Date</label>

                    <div class="col-md-6">
                        <input id="deliver_date" type="text" class="form-control" name="deliver_date" value="{{ old('deliver_date') }}">

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
                            <i class="fa fa-btn fa-plus"></i> Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

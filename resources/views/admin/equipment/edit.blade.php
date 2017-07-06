@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Edit Equipment</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Equipment
        </div>
        <div class="panel panel-body">
            {!! Form::model($equipment, ['route' => ['admin.equipment.update', $equipment->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                <div class="form-group{{ $errors->has('vendor_id') ? ' has-error' : '' }}">
                    <label for="vendor_id" class="col-md-4 control-label">Vendor</label>

                    <div class="col-md-6">
                        {!! Form::select('vendor_id', $vendors, null, ['placeholder' => 'Select Vendor...', 'class' => 'form-control']) !!}

                        @if ($errors->has('vendor_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('vendor_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('equipment_type_id') ? ' has-error' : '' }}">
                    <label for="equipment_type_id" class="col-md-4 control-label">Equipment Type</label>

                    <div class="col-md-6">
                        {!! Form::select('equipment_type_id', $equipment_types, null, ['placeholder' => 'Select Equipment Type...', 'class' => 'form-control']) !!}
            

                        @if ($errors->has('equipment_type_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('equipment_type_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                        {!! Form::text('description', null, ['class' => 'form-control']) !!}

                        @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
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
            </form>
        </div>
    </div>
</div>
@endsection

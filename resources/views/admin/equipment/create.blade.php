@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Equipment</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">

    <div class="panel panel-default">
        <div class="panel-heading">
            Add a new Equipment
        </div>
        <div class="panel panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.equipment.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('vendor') ? ' has-error' : '' }}">
                    <label for="vendor_id" class="col-md-4 control-label">Vendor</label>

                    <div class="col-md-6">
                        <select class="form-control" name="vendor_id">
                            <option selected disabled>Select Vendor...</option>

                            @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" {{ old('vendor') == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('vendor'))
                        <span class="help-block">
                            <strong>{{$errors->first('vendor') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('equipmenttype') ? ' has-error' : '' }}">
                    <label for="equipmenttype_id" class="col-md-4 control-label">Equipment Type</label>

                    <div class="col-md-6">
                        <select class="form-control" name="equipmenttype_id">
                            <option selected disabled>Select Equipment Type...</option>

                            @foreach ($equipmentTypes as $type)
                            <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('equipmenttype'))
                        <span class="help-block">
                            <strong>{{$errors->first('equipmenttype') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

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
                            <i class="fa fa-btn fa-plus"></i> Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

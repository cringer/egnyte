@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Edit Position</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">
	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Position
		</div>
		<div class="panel panel-body">
			{!! Form::model($position, ['route' => ['admin.positions.update', $position->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}

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

                <div class="form-group{{ $errors->has('acronym') ? ' has-error' : '' }}">
                    <label for="acronym" class="col-md-4 control-label">Acronym</label>

                    <div class="col-md-6">
                        {!! Form::text('acronym', null, ['class' => 'form-control']) !!}

                        @if ($errors->has('acronym'))
                            <span class="help-block">
                                <strong>{{ $errors->first('acronym') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                 <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                    <label for="color" class="col-md-4 control-label">Color</label>

                    <div class="col-md-6">
                        {!! Form::text('color', null, ['class' => 'form-control']) !!}

                        @if ($errors->has('color'))
                            <span class="help-block">
                                <strong>{{ $errors->first('color') }}</strong>
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

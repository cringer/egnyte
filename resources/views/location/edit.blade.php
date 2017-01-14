@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Location</div>
                <div class="panel-body">
                    {!! Form::model($location, ['route' => ['location.update', $location->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group{{ $errors->has('site') ? ' has-error' : '' }}">
                            <label for="site" class="col-md-4 control-label">Site</label>

                            <div class="col-md-6">
                                {!! Form::text('site', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('site'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Update
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task Group</div>
                <div class="panel-body">
                    {!! Form::model($taskgroup, ['route' => ['taskgroup.update', $taskgroup->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position_id') ? ' has-error' : '' }}">
                            <label for="position_id" class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                {!! Form::select('position_id', $positionsArray, null, ['class' => 'form-control']) !!}

                                @if ($errors->has('position_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('position') }}</strong>
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
    </div>
</div>
@endsection

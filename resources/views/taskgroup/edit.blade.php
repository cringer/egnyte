@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Task Group</div>
                <div class="panel-body">
                    {!! Form::model($taskgroup, ['route' => ['taskgroup.update', $taskgroup->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/taskgroup') }}">
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
                                {!! Form::select('position_id', $positions->title, $taskgroup->position) !!}
                                {{-- <select class="form-control" name="position_id">
                                    <option selected disabled>Select Position...</option>

                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                            {{ $position->title }}
                                        </option>
                                    @endforeach
                                </select> --}}

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
                                    <i class="fa fa-btn fa-plus"></i> Add
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

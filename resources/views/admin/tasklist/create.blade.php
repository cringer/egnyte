@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Tasklist</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">

    <div class="panel panel-default">
        <div class="panel-heading">
            Add a new Task List
        </div>
        <div class="panel panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('tasklist.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                    <label for="icon" class="col-md-4 control-label">Icon</label>

                    <div class="col-md-6">
                        <input id="icon" type="text" class="form-control" name="icon" value="{{ old('icon') }}">

                        @if ($errors->has('icon'))
                        <span class="help-block">
                            <strong>{{ $errors->first('icon') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('alert_days') ? ' has-error' : '' }}">
                    <label for="alert_days" class="col-md-4 control-label">Alert Days</label>

                    <div class="col-md-6">
                        <input id="alert_days" type="text" class="form-control" name="alert_days" value="{{ old('alert_days') }}">

                        @if ($errors->has('alert_days'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alert_days') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                    <label for="position_id" class="col-md-4 control-label">Position</label>

                    <div class="col-md-6">
                        <select class="form-control" name="position_id">
                            <option selected disabled>Select Position...</option>

                            @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ old('position') == $position->id ? 'selected' : '' }}>
                                {{ $position->name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('position'))
                        <span class="help-block">
                            <strong>{{$errors->first('position') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                    <label for="user_id" class="col-md-4 control-label">Assigned User</label>

                    <div class="col-md-6">
                        <select class="form-control" name="user_id">
                            <option selected disabled>Select Assigned User...</option>

                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{$errors->first('user') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                {{-- <div class="form-group{{ $errors->has('notify_group') ? ' has-error' : '' }}">
                    <label for="notify_group" class="col-md-4 control-label">Notify Group</label>

                    <div class="col-md-6">
                        <select class="form-control" name="notify_group">
                            <option selected disabled>Select Notify Group...</option>

                            @foreach ($notify_groups as $notify_group)
                            <option value="{{ $notify_group->id }}" {{ old('notify_group') == $notify_group->id ? 'selected' : '' }}>
                                {{ $notify_group->name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('notify_group'))
                        <span class="help-block">
                            <strong>{{$errors->first('notify_group') }}</strong>
                        </span>
                        @endif
                    </div>
                </div> --}}

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

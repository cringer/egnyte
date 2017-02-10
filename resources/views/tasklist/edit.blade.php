@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task List</div>
                <div class="panel-body">
                    {!! Form::model($tasklist, ['route' => ['tasklist.update', $tasklist->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}
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

                        <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                            <label for="icon" class="col-md-4 control-label">Icon</label>

                            <div class="col-md-6">
                                {!! Form::text('icon', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('icon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('task_group') ? ' has-error' : '' }}">
                            <label for="task_group_id" class="col-md-4 control-label">Task Group</label>

                            <div class="col-md-6">
                                {!! Form::select('taskgroup_id', $taskgroupsArray, null, ['class' => 'form-control']) !!}


                                @if ($errors->has('task_group_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('taskgroup_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Assigned User</label>

                            <div class="col-md-6">
                                {!! Form::select('user_id', $usersArray, null, ['class' => 'form-control']) !!}

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notify_group_id') ? ' has-error' : '' }}">
                            <label for="notify_group_id" class="col-md-4 control-label">Notify Group</label>

                            <div class="col-md-6">
                                <select class="form-control" name="notify_group_id">
                                    <option selected disabled>Select Notify Group...</option>

                                    @foreach ($notify_groups as $notify_group)
                                        <option value="{{ $notify_group->id }}" {{ old('notify_group') == $notify_group->id ? 'selected' : '' }}>
                                            {{ $notify_group->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('notify_group_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('notify_group_id') }}</strong>
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

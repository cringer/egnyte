@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task</div>
                <div class="panel-body">
                    {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Task Name</label>

                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('task_list_id') ? ' has-error' : '' }}">
                            <label for="task_list_id" class="col-md-4 control-label">Task List</label>

                            <div class="col-md-6">
                                {!! Form::select('task_list_id', $tasklistsArray, null, ['class' => 'form-control']) !!}

                                {{-- <select class="form-control" name="task_list_id">
                                    <option selected disabled>Select Task List...</option>

                                    @foreach ($tasklists as $tasklist)
                                        <option value="{{ $tasklist->id }}" {{ old('task_list_id') == $tasklist->id ? 'selected' : '' }}>
                                            {{ $tasklist->name }}
                                        </option>
                                    @endforeach
                                </select> --}}

                                @if ($errors->has('task_list_id'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('tasklist') }}</strong>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

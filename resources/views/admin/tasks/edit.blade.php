@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Edit Task</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Task
        </div>
        <div class="panel panel-body">
            {!! Form::model($task, ['route' => ['admin.tasks.update', $task->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                <div class="form-group{{ $errors->has('task_list_id') ? ' has-error' : '' }}">
                    <label for="task_list_id" class="col-md-4 control-label">Task List</label>

                    <div class="col-md-6">
                        {!! Form::select('task_list_id', $tasklists, null, ['placeholder' => 'Select Task List...', 'class' => 'form-control']) !!}

                        @if ($errors->has('task_list_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('task_list_id') }}</strong>
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

                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                    <label for="order" class="col-md-4 control-label">Order</label>

                    <div class="col-md-6">
                        {!! Form::text('order', null, ['class' => 'form-control']) !!}

                        @if ($errors->has('order'))
                            <span class="help-block">
                                <strong>{{ $errors->first('order') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                 <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                    <label for="details" class="col-md-4 control-label">Details</label>

                    <div class="col-md-6">
                        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}

                        @if ($errors->has('details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('details') }}</strong>
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

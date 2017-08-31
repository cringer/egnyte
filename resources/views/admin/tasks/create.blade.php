@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Task</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add a new Task
        </div>
        <div class="panel panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.tasks.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('task_list_id') ? ' has-error' : '' }}">
                    <label for="task_list_id" class="col-md-4 control-label">Task List</label>

                    <div class="col-md-6">
                        <select class="form-control" name="task_list_id">
                            <option selected disabled>Select Task List...</option>

                            @foreach ($tasklists as $tasklist)
                            <option value="{{ $tasklist->id }}" {{ old('task_list_id') == $tasklist->id ? 'selected' : '' }}>
                                {{ $tasklist->name }}
                            </option>
                            @endforeach
                        </select>

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
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                    <label for="details" class="col-md-4 control-label">Details</label>

                    <div class="col-md-6">
                        <textarea id="details" class="form-control" name="details" value="{{ old('details') }}"></textarea>

                        @if ($errors->has('details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('details') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                    <label for="order" class="col-md-4 control-label">Order</label>

                    <div class="col-md-6">
                        <input id="order" type="text" class="form-control" name="order" value="{{ old('order') }}">

                        @if ($errors->has('order'))
                            <span class="help-block">
                                <strong>{{ $errors->first('order') }}</strong>
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

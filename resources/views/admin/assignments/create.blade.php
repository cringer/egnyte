@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add Assignment</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">

    <div class="panel panel-default">
        <div class="panel-heading">
            Add a new Assignment
        </div>
        <div class="panel panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.assignments.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('assignment') ? ' has-error' : '' }}">
                    <label for="new_hire_id" class="col-md-4 control-label">New Hire</label>

                    <div class="col-md-6">
                        <select class="form-control" name="new_hire_id">
                            <option selected disabled>Select New Hire...</option>

                            @foreach ($newhires as $hire)
                            <option value="{{ $hire->id }}" {{ old('hire') == $hire->id ? 'selected' : '' }}>
                                {{ $hire->name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('new_hire_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('new_hire_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('assignmentmethod') ? ' has-error' : '' }}">
                    <label for="assignmentmethod" class="col-md-4 control-label">Assignment Method</label>

                    <div class="col-md-6">
                        <select class="form-control" name="method_id">
                            <option selected disabled>Select Assignment Method...</option>

                            @foreach ($assignmentMethods as $method)
                            <option value="{{ $method->id }}" {{ old('method') == $method->id ? 'selected' : '' }}>
                                {{ $method->name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('method'))
                        <span class="help-block">
                            <strong>{{$errors->first('method') }}</strong>
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


@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Edit Assignment</h1>
</div>

<div class="col-sm-6 col-sm-offset-4 main">

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Assignment
        </div>
        <div class="panel panel-body">
            {!! Form::model($assignment, ['route' => ['admin.assignment.update', $assignment->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                <div class="form-group{{ $errors->has('assignment') ? ' has-error' : '' }}">
                    <label for="new_hire_id" class="col-md-4 control-label">New Hire</label>

                    <div class="col-md-6">
                        {!! Form::select('new_hire_id', $new_hires, null, ['placeholder' => 'Select New Hire...', 'class' => 'form-control']) !!}

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
                        {!! Form::select('method_id', $assignment_methods, null, ['placeholder' => 'Assignment Method...', 'class' => 'form-control']) !!}

                        @if ($errors->has('method_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('method') }}</strong>
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
@endsection


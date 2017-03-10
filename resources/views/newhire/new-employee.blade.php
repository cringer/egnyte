<div class="col-md-4">
    <h3>New Employee</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="{{ url('/newhire') }}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="What is the name of the new employee?" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
                    <label for="position_id" class="control-label">Position:</label>

                    <select class="form-control" name="position_id">
                        <option selected disabled>Select Position...</option>

                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('position_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('position') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                    <label for="status_id" class="control-label">Status:</label>

                    <select class="form-control" name="status_id">
                        <option selected disabled>Select Status...</option>

                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="checkbox" name="benefited" value="1">&nbsp;Benefited?

                    @if ($errors->has('status_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('status_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('hire_date') ? 'has-error' : '' }}">
                    <label for="hire_date" class="control-label">Hire Date:</label>

                    <input type="text" class="form-control" id="hire_date" name="hire_date" value="{{ old('hire_date') }}">

                    @if ($errors->has('hire_date'))
                        <span class="help-block">
                            <strong>{{$errors->first('hire_date') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
                    <label for="location_id" class="control-label">Location:</label>

                    <select class="form-control" name="location_id">
                        <option selected disabled>Select Location...</option>

                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('location_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('location_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-bullhorn"></i> Announce
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

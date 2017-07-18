@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>New Hire</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Assignment</th>
                        <th>Hire Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    <tr>
                        <td>{{ $newhire->id }}</td>
                        <td>{{ $newhire->name }}</td>
                        <td>{{ $newhire->position->name }}</td>
                        <td>{{ $newhire->assignment->method->name }}</td>
                        <td>{{ $newhire->hire_date }}</td>
                        <td>{{ $newhire->created_at }}</td>
                        <td>{{ $newhire->updated_at }}</td>
                    </tr>
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Status</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    <tr>
                        <td>{{ $status->id }}</td>
                        <td>{{ $status->status }}</td>
                        <td>{{ $status->slug }}</td>
                        <td>{{ $status->created_at }}</td>
                        <td>{{ $status->updated_at }}</td>
                    </tr>
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

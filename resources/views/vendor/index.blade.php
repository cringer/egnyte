@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Vendors</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>&nbsp;</th>
                    </tr>
                    @foreach ($vendors as $vendor)
                        <tr>
                            <td>{{ $vendor->id }}</td>
                            <td>{{ $vendor->name }}</td>
                            <td>{{ $vendor->created_at }}</td>
                            <td>{{ $vendor->updated_at }}</td>
                            <td align="center">
                                {!! Form::open(['route' => ['vendor.destroy', $vendor->id], 'method' => 'delete']) !!}
                                    <a href="{{ url("vendor/$vendor->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                    <a href="{{ url("vendor/$vendor->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('vendor.create') }}" class="btn btn-primary" role="button">
                    <i class="fa fa-btn fa-plus"></i> Add New Vendor
                </a>
            </ul>
        </div>
    </div>
</div>
@endsection

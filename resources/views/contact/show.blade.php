@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Contact</h3>

            <ul class="list-group">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>{{ $contact->updated_at }}</td>
                        <td align="center">
                            {!! Form::open(['route' => ['contact.destroy', $contact->id], 'method' => 'delete']) !!}
                                <a href="{{ url("contact/$contact->id/edit") }}"><i class="fa fa-btn fa-pencil-square"></i></a>&nbsp;
                                <a href="{{ url("contact/$contact->id/edit") }}"><i class="fa fa-btn fa-trash"></i></a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </table>
            </ul>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3>New Hires</h3>

        <ul class="list-group">
            @foreach ($newhires as $newhire)
                <a href="newhire/{{ $newhire->slug }}">
                    <li class="list-group-item">
                        <strong>{{ $newhire->name }}</strong> - <span class="label label-default" style="background: {{ $newhire->position->color }}">{{ strtoupper($newhire->position->slug) }}</span><br />
                        <i class="fa fa-btn fa-building-o"></i>{{ $newhire->location->site }} - {{ $newhire->status->status }}<br />
                        <i class="fa fa-btn fa-calendar"></i>&nbsp;{{ $newhire->hire_date }}</i>
                    </li>
                </a>
                <br />
            @endforeach
            {{ $newhires->links() }}
        </ul>
    </div>

    @include('newhire.new-employee')
</div>
@stop
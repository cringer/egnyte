@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3>New Hires</h3>

        <ul class="list-group">
            @foreach ($newhires as $newhire)
                <a href="newhire/{{ $newhire->slug }}">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>{{ $newhire->name }}</strong> - <span class="label label-default" style="background: {{ $newhire->position->color }}">{{ strtoupper($newhire->position->acronym) }}</span><br />
                                <i class="fa fa-btn fa-building-o"></i>{{ $newhire->location->name }} - {{ $newhire->status->name }}<br />
                                <i class="fa fa-btn fa-calendar"></i>&nbsp;{{ $newhire->hire_date }}</i>
                            </div>
                            <div class="col-md-4">
                                <i class="fa fa-btn fa-building-o"></i>
                                <i class="fa fa-btn fa-building-o"></i>
                            </div>
                        </div>
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
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3>New Hires</h3>

        <ul class="list-group">
            @foreach ($newhires as $newhire)
            <li class="list-group-item">
                <div class="row">
                    <div id="newhire" class="col-md-4">
                        <a href="newhire/{{ $newhire->slug }}">
                            {{ $newhire->name }}<br>
                            Position: <span class="label" style="background-color:{{ $newhire->position->color }}">{{ $newhire->position->acronym }}</span><br>
                            Start Date: {{ $newhire->hire_date}}
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="icon"><br>
                            @if ($newhire->assignment)
                                @if ($newhire->assignment->method->id == 1)
                                    @if ($newhire->assignment->order)
                                        <a href="/order/{{ $newhire->assignment->order->id }}" target="_blank"><i class="fa fa-shopping-cart fa-2x"></i></a>
                                    @else
                                        <i class="fa fa-question fa-2x"></i>
                                    @endif
                                @else
                                    <i class="fa fa-check fa-2x complete"></i>
                                @endif
                            @else
                                <i class="fa fa-question fa-2x"></i>
                            @endif
                        <div>
                    </div>
                </div>
            </li>
            <br>
            @endforeach

            {{ $newhires->links() }}
        </ul>
    </div>

    @include('newhire.new-employee')
</div>
@stop
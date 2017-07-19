@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3>New Hires</h3>

        @foreach ($newhires as $newhire)
            <article class="flex" style="border: 1px solid #ccc;">
                <div class="box1 flex">
                    <a href="newhire/{{ $newhire->slug }}" style="font-size: 16px">
                        <span style="font-size: 18px">{{ $newhire->name }}</span><br>
                        {{ $newhire->position->name }} <span class="label" style="background-color:{{ $newhire->position->color }}">{{ $newhire->position->acronym }}</span><br>
                        Start Date: {{ $newhire->hire_date}}
                    </a>
                </div>
                <div class="box box2 flex">
                    @if (count($newhire->assignment))
                        @if ($newhire->assignment->method->id == 1)
                            @if (count($newhire->assignment->orders))
                                @foreach ($newhire->assignment->orders as $order)
                                    <a href="/order/{{ $order->id }}" target="_blank">
                                        <div class="flex iconbox">
                                            <i class="fa fa-shopping-cart fa-2x"></i>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div class="flex iconbox">
                                    <i class="fa fa-exclamation-triangle fa-2x warning"></i>
                                </div>
                            @endif
                        @else
                            <div class="flex iconbox">
                                <i class="fa fa-check fa-2x complete"></i>
                            </div>
                        @endif
                    @else
                        <div class="flex iconbox">
                            <i class="fa fa-question fa-2x"></i>
                        </div>
                    @endif
                </div>
            </article>

        @endforeach

            {{ $newhires->links() }}
        </ul>
    </div>

    @include('newhire.new-employee')
</div>
@stop
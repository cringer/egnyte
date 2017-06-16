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
                                {{ $newhire->name }}
                            </div>
                        </div>
                    </li>
                </a>
                <br />
            @endforeach
        </ul>
    </div>

    @include('newhire.new-employee')
</div>
@stop
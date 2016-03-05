@extends('master')

@section('content')
    @parent

    <p>Child Content</p>
@stop

@section('content')
    @foreach($employees as $e)
        <!-- <p>{{ $e->first_name }}</p> -->
        <!-- =========CONDITIONAL=========== -->
        {{ $e->first_name }},
        @if($e->gender=='M')
            Male
        @else
            Female
        @endif
    @endforeach

    @foreach($employees as $e)
        <p>
            {{ $e->first_name }},
            {{ genderHelper($e->gender) }}
        </p>
    @endforeach
@stop
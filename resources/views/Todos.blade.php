@extends('layout')

@section('content')
    @foreach($todos as $todo)
      {{ $todo->todo }}
    <hr>
    @endforeach
@stop

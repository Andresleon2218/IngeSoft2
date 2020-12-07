@extends('layouts.app')
@section('content')
    <a href="{{route('schedule.create')}}">Crear</a>
    @foreach ($schedules as $schedule)
    {{$schedule->start_date}}
    @endforeach
@endsection

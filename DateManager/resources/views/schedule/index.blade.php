@extends('layouts.app')
@section('content')
    <a href="{{route('schedule.create')}}">Crear</a>
    <a href="{{ route('excelSchedule')}}">Exportar a excel</a>
    <a href="{{ route('streamSchedule')}}">Ver PDF de horarios</a>
    <a href="{{ route('downloadSchedule')}}">Exportar a PDF</a>
    @foreach ($schedules as $schedule)
    {{$schedule->start_date}}
    @endforeach
@endsection

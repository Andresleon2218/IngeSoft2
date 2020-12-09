@extends('layouts.app')

@section('module')
{{__(' | Citas')}}
@endsection

@section('title')
{{__('Registro de una nueva cita ')}}<i class="fa fa-angle-double-right"></i>{{' '.$specialty->name.' '}}<i class="fa fa-angle-double-right"></i>{{' '.$professional->names.' '}}<i class="fa fa-angle-double-right"></i>{{__(' Horario')}}
@endsection

@section('content')
<div class="row justify-content-around">
    @foreach ($schedules as $schedule)
    <div class="col-3 card shadow-lg mt-5 p-4 rounded">
        <h5 class="card-title text-dark">{{ $schedule->start_time.' - '.$schedule->end_time }}</h5>
        <p class="card-text">{{ $schedule->start_date }} <i class="fa fa-long-arrow-right"></i> {{ $schedule->end_date }}</p>
        <p class="card-text">
            <i class="fa fa-calendar"></i>
            @if ($schedule->monday)
            Lunes
            @endif
            @if ($schedule->tuesday)
            Martes
            @endif
            @if ($schedule->wednesday)
            Miércoles
            @endif
            @if ($schedule->thursday)
            Jueves
            @endif
            @if ($schedule->friday)
            Viernes
            @endif
            @if ($schedule->saturday)
            Sábado
            @endif
            @if ($schedule->sunday)
            Domingo
            @endif
        </p>
        <a href="{{ route('date.createDate',[$specialty,$professional,$schedule]) }}" class="btn btn-outline-secondary">Agendar cita</a>
    </div>
    @endforeach
</div>
@endsection

{{$schedules->links()}}

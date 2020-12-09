@extends('layouts.app')

@section('module')
{{__(' | Citas')}}
@endsection

@section('title')
{{__('Registro de una nueva cita ')}}<i class="fa fa-angle-double-right"></i>{{' '.$specialty->name.' '}}<i class="fa fa-angle-double-right"></i>{{__(' Profesional')}}
@endsection

@section('content')
<div class="row justify-content-around">
    @foreach ($professionals as $professional)
    <div class="col-3 card shadow-lg mt-5 p-4 rounded">
        <h5 class="card-title text-dark">{{ $professional->names.' '.$professional->lastnames }}</h5>
        <a href="{{ route('date.schedules',[$specialty,$professional]) }}" class="btn btn-outline-secondary">Ver horarios</a>
    </div>
    @endforeach
</div>
@endsection

{{$professionals->links()}}

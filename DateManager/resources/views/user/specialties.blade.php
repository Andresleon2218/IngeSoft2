@extends('layouts.app')

@section('module')
{{__(' | Citas')}}
@endsection

@section('title')
{{__('Registro de una nueva cita ')}}<i class="fa fa-angle-double-right"></i>{{__(' Especialidad')}}
@endsection

@section('content')
<div class="row justify-content-around">
    @foreach ($specialties as $specialty)
    <div class="col-3 card shadow-lg mt-5 p-5 rounded">
        <h5 class="card-title text-dark">{{ $specialty->name }}</h5>
        <p class="card-text">{{ $specialty->description }}</p>
        <a href="{{ route('date.professionals',$specialty) }}" class="btn btn-outline-secondary">Ver profesionales</a>
    </div>
    @endforeach
</div>
@endsection

{{$specialties->links()}}

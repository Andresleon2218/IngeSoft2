@extends('layouts.app')

@section('module')
    {{__(' | Horarios')}}
@endsection

@section('title')
{{__('Registro de una nueva cita ')}}<i class="fa fa-angle-double-right"></i>{{' '.$specialty->name.' '}}<i class="fa fa-angle-double-right"></i>{{' '.$professional->names.' '}}<i class="fa fa-angle-double-right"></i>{{' '.$schedule->start_time.' - '.$schedule->end_time}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-7 card shadow-lg mt-5 p-5 rounded">
        @include('partials.error')
        <form class="row justify-content-center" action="{{ route('date.store') }}" method="post">
            @csrf
            <input type="text" name="schedule" hidden value="{{ $schedule->id }}">

            <div class="form-group col-5">
                <label>Fecha</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}">
                @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-5">
                <label>Hora</label>
                <input type="time" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}">
                @error('start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-10">
                <label>Descripción</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-10">
                <div class="row justify-content-center">
                    <a href="{{ route('date.index') }}" class="btn btn-outline-secondary m-2">Cancelar</a>
                    <input class="btn btn-outline-success m-2" type="submit" value="Agendar">
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

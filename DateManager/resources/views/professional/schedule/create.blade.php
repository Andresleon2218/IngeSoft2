@extends('layouts.app')

@section('module')
    {{__(' | Horarios')}}
@endsection

@section('title')
    {{__('Registro de un nuevo horario')}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-7 card shadow-lg mt-5 p-5 rounded">
        <form class="row justify-content-center" action="{{ route('schedule.store') }}" method="post">
            @csrf

            <div class="form-group col-10">
                <label>Hora de inicio</label>
                <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}">
                @error('start_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-10">
                <label>Hora de terminacion</label>
                <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}">
                @error('end_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-10">
                <label>Fecha de inicio</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-10">
                <label>Fecha de terminación</label>
                <input type="time" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-10">
                <label>Duración de cita (Horas)</label>
                <input type="text" class="form-control @error('duration_date') is-invalid @enderror" name="duration_date" value="{{ old('duration_date') }}">
                @error('duration_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="row justify-content-center">
                <a href="{{ route('schedule.index') }}" class="btn btn-outline-secondary m-2">Cancelar</a>
                <input class="btn btn-outline-success m-2" type="submit" value="Registrar">
            </div>

        </form>
    </div>
</div>



    <form action="{{route('schedule.store')}}" method="post">
        @csrf

        <label>Días</label>
        <input type="checkbox" name="days[]" id="monday" value="monday">
        <label for="monday">Lunes</label>
        <input type="checkbox" name="days[]" id="tuesday" value="tuesday">
        <label for="tuesday">Martes</label>
        <input type="checkbox" name="days[]" id="wednesday" value="wednesday">
        <label for="wednesday">Miércoles</label>
        <input type="checkbox" name="days[]" id="thursday" value="thursday">
        <label for="thursday">Jueves</label>
        <input type="checkbox" name="days[]" id="friday" value="friday">
        <label for="friday">Viernes</label>
        <input type="checkbox" name="days[]" id="saturday" value="saturday">
        <label for="saturday">Sábado</label>
        <input type="checkbox" name="days[]" id="sunday" value="sunday">
        <label for="sunday">Domingo</label>

        <label for="start_time">Hora de inicio</label>
        <input type="time" name="start_time" id="start_time">

        <label for="end_time">Hora de terminación</label>
        <input type="time" name="end_time" id="end_time">

        <label for="start_date">Fecha de inicio</label>
        <input type="date" name="start_date" id="start_date">

        <label for="end_date">Fecha de terminación</label>
        <input type="date" name="end_date" id="end_date">

        <label for="duration_of_date">Duración de cada cita</label>
        <input type="time" name="duration_of_date" id="duration_of_date">

        <input type="submit" value="Registrar">

    </form>

@endsection


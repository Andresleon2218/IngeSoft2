@extends('layouts.app')

@section('module')
{{__(' | Horarios')}}
@endsection

@section('title')
{{__('Actualización de horario')}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-7 card shadow-lg mt-5 p-5 rounded">
        @include('partials.error')
        <form class="row justify-content-center" action="{{ route('schedule.update',$schedule) }}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group col-5">
                <label>Hora de inicio</label>
                <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time"
                    value="{{ old('start_time',$schedule->start_time) }}">
                @error('start_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-5">
                <label>Hora de finalización</label>
                <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time"
                    value="{{ old('end_time',$schedule->end_time) }}">
                @error('end_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-5">
                <label>Fecha de inicio</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                    value="{{ old('start_date',$schedule->start_date) }}">
                @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-5">
                <label>Fecha de finalización</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                    value="{{ old('end_date',$schedule->end_date) }}">
                @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-10">
                <label>Días de atención</label>
                <div class="row justify-content-center">
                    <div class="form-check form-check-inline col-3">
                        <input class="form-check-input" type="checkbox" name="days[]" id="1" value="monday"
                        @if (old('days'))
                        @foreach (old('days') as $item)
                        @if ($item=='monday' ) checked @break @endif
                        @endforeach
                        @elseif ($schedule->monday) checked
                        @endif>
                        <label class="form-check-label" for="1">Lunes</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                        <input class="form-check-input" type="checkbox" name="days[]" id="2" value="tuesday"
                        @if (old('days'))
                        @foreach (old('days') as $item)
                        @if ($item=='tuesday' ) checked @break @endif
                        @endforeach
                        @elseif ($schedule->tuesday) checked
                        @endif>
                        <label class="form-check-label" for="2">Martes</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                        <input class="form-check-input" type="checkbox" name="days[]" id="3" value="wednesday"
                        @if (old('days'))
                        @foreach (old('days') as $item)
                        @if ($item=='wednesday' ) checked @break @endif
                        @endforeach
                        @elseif ($schedule->wednesday) checked
                        @endif>
                        <label class="form-check-label" for="3">Miércoles</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                        <input class="form-check-input" type="checkbox" name="days[]" id="4" value="thursday"
                        @if (old('days'))
                        @foreach (old('days') as $item)
                        @if ($item=='thursday' ) checked @break @endif
                        @endforeach
                        @elseif ($schedule->thursday) checked
                        @endif>
                        <label class="form-check-label" for="4">Jueves</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                        <input class="form-check-input" type="checkbox" name="days[]" id="5" value="friday"
                        @if (old('days'))
                        @foreach (old('days') as $item)
                        @if ($item=='friday' ) checked @break @endif
                        @endforeach
                        @elseif ($schedule->friday) checked
                        @endif>
                        <label class="form-check-label" for="5">Viernes</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                        <input class="form-check-input" type="checkbox" name="days[]" id="6" value="saturday"
                        @if (old('days'))
                        @foreach (old('days') as $item)
                        @if ($item=='saturday' ) checked @break @endif
                        @endforeach
                        @elseif ($schedule->saturday) checked
                        @endif>
                        <label class="form-check-label" for="6">Sábado</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                        <input class="form-check-input" type="checkbox" name="days[]" id="7" value="sunday"
                        @if (old('days'))
                        @foreach (old('days') as $item)
                        @if ($item=='sunday' ) checked @break @endif
                        @endforeach
                        @elseif ($schedule->sunday) checked
                        @endif>
                        <label class="form-check-label" for="7">Domingo</label>
                    </div>
                </div>
                @error('days')
                <label class="font-weight-bold text-danger" style="font-size:80%">
                    {{$message}}
                </label>
                @enderror
            </div>

            <div class="form-group col-5">
                <label>Duración de cita (Horas)</label>
                <input type="text" class="form-control @error('duration_date') is-invalid @enderror"
                    name="duration_date" value="{{ old('duration_date',$schedule->duration_date) }}">
                @error('duration_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-10">
                <div class="row justify-content-center">
                    <a href="{{ route('schedule.index') }}" class="btn btn-outline-secondary m-2">Cancelar</a>
                    <input class="btn btn-outline-success m-2" type="submit" value="Actualizar">
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

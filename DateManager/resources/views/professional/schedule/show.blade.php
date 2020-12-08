@extends('layouts.app')

@section('module')
{{__(' | Horarios')}}
@endsection

@section('title')
{{ $schedule->start_time.' - '.$schedule->end_time.' ( '.$schedule->start_date }} <i class="fa fa-angle-double-right"></i> {{ $schedule->end_date.' )' }}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-8 mt-5">
        <table class="table shadow table-striped p-5 mb-5 rounded">
            <tbody>
                <tr>
                    <th scope="row">Fecha de inicio</th>
                    <td>{{ $schedule->start_date }}</td>
                </tr>
                <tr>
                    <th scope="row">Fecha de finalización</th>
                    <td>{{ $schedule->end_date }}</td>
                </tr>
                <tr>
                    <th scope="row">Hora de inicio de atención</th>
                    <td>{{ $schedule->start_time }}</td>
                </tr>
                <tr>
                    <th scope="row">Hora de finalización</th>
                    <td>{{ $schedule->end_time }}</td>
                </tr>
                <tr>
                    <th scope="row">Días</th>
                    <td>
                        @if ($schedule->monday)
                            {{__('Lunes ')}}
                        @endif
                        @if ($schedule->tuesday)
                            {{__('Martes ')}}
                        @endif
                        @if ($schedule->wednesday)
                            {{__('Miércoles ')}}
                        @endif
                        @if ($schedule->thursday)
                            {{__('Jueves ')}}
                        @endif
                        @if ($schedule->friday)
                            {{__('Viernes ')}}
                        @endif
                        @if ($schedule->saturday)
                            {{__('Sábado ')}}
                        @endif
                        @if ($schedule->sunday)
                            {{__('Domingo ')}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Estado</th>
                    <td>
                        @if ($schedule->active)
                        Activo
                        @else
                        Inactivo
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <a href="{{ route('schedule.index') }}" class="btn btn-outline-secondary mx-3">Volver al listado</a>
    <a data-target="#delete-modal" data-action="{{route('schedule.destroy',$schedule)}}"
        data-name="{{ $schedule->start_time.' - '.$schedule->end_time.' ('.$schedule->start_date.' - '.$schedule->end_date.')' }}" data-toggle="modal" href=""
        class="btn btn-outline-danger mx-3">
        Eliminar horario
    </a>
</div>

@endsection

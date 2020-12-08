@extends('layouts.app')

@section('module')
{{__(' | Horarios')}}
@endsection

@section('title')
{{__('Horarios de atención')}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-10 mt-3">
        @include('partials.success')
        <div class="row">
            <a class="btn btn-outline-success mx-2" href="{{ route('schedule.create') }}">Nuevo horario</a>
            <a class="btn btn-outline-secondary mx-2" href="{{ route('schedule.streamPDF') }}">Ver listado como PDF</a>
            <a class="btn btn-outline-secondary mx-2" href="{{ route('schedule.downloadPDF')}}">Exportar como PDF</a>
            <a class="btn btn-outline-secondary mx-2" href="{{ route('schedule.exportExcel') }}">Exportar como Excel</a>
        </div>
        <table class="table shadow table-striped p-5 mb-5 mt-3 rounded">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de termino</th>
                    <th scope="col">Hora de inicio</th>
                    <th scope="col">Hora de termino</th>
                    <th scope="col">Duración de cita (Horas)</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->start_date }}</td>
                    <td>{{ $schedule->end_date }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>{{ $schedule->duration_date }}</td>
                    <td>
                        @if ($schedule->active)
                        Activo
                        @else
                        Inactivo
                        @endif
                    </td>
                    <td class="row justify-content-center">
                        <a href="{{ route('schedule.show',$schedule) }}" title="Ver" class="col-auto">
                            <i class="fa fa-eye font-weight-bold text-dark"></i>
                        </a>
                        <a href="{{ route('schedule.edit',$schedule) }}" title="Editar" class="col-auto">
                            <i class="fa fa-edit font-weight-bold text-dark"></i>
                        </a>
                        <a data-target="#delete-modal" data-action="{{ route('schedule.destroy',$schedule) }}" data-name="{{$schedule->start_date}}" data-toggle="modal" title="Eliminar" class="col-auto" href="">
                            <i class="fa fa-trash font-weight-bold text-dark"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$schedules->links()}}
    </div>
</div>
@endsection


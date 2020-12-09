@extends('layouts.app')

@section('module')
{{__(' | Citas')}}
@endsection

@section('title')
{{__('Citas agendadas')}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-10 mt-3">
        @include('partials.success')
        <div class="row">
            <a class="btn btn-outline-success mx-2" href="{{ route('date.specialties') }}">Nueva cita</a>
        </div>
        <table class="table shadow table-striped p-5 mb-5 mt-3 rounded">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Profesional</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <!--th scope="col" class="text-center">Opciones</th-->
                </tr>
            </thead>
            <tbody>
                @foreach ($dates as $date)
                <tr>
                    <td>{{ $date->date }}</td>
                    <td>{{ $date->start }}</td>
                    <td>{{ $date->schedule->professional->names.' '.$date->schedule->professional->lastnames }}</td>
                    <td>{{ $date->description }}</td>
                    <td>
                        @if ($date->active)
                        Activo
                        @else
                        Inactivo
                        @endif
                    </td>
                    <!--td class="row justify-content-center">
                        <a href="{{ route('date.show',$date) }}" title="Ver" class="col-auto">
                            <i class="fa fa-eye font-weight-bold text-dark"></i>
                        </a>
                        <a data-target="#delete-modal" data-action="{{ route('date.destroy',$date) }}" data-name="{{$date->start.' ('.$date->date.')'}}" data-toggle="modal" title="Eliminar" class="col-auto" href="">
                            <i class="fa fa-trash font-weight-bold text-dark"></i>
                        </a>
                    </td-->
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$dates->links()}}
    </div>
</div>
@endsection


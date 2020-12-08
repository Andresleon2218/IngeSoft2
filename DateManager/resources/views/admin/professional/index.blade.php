@extends('layouts.app')

@section('module')
{{__(' | Profesionales')}}
@endsection

@section('title')
{{__('Profesionales')}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-10 mt-3">
        @include('partials.success')
        <div class="row">
            <a href="{{ route('professional.create') }}" class="btn btn-outline-success mx-2">Nuevo profesional</a>
        </div>
        <table class="table shadow table-striped p-5 mb-5 mt-3 rounded">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Número de documento</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($professionals as $professional)
                <tr>
                    <th scope="row">{{ $professional->document }}</th>
                    <td>{{ $professional->names }}</td>
                    <td>{{ $professional->lastnames }}</td>
                    <td>
                        @if ($professional->active)
                        Activo
                        @else
                        Inactivo
                        @endif
                    </td>
                    <td class="row justify-content-center">
                        <a href="{{ route('professional.show',$professional) }}" title="Ver" class="col-auto">
                            <i class="fa fa-eye font-weight-bold text-dark"></i>
                        </a>
                        <a data-target="#delete-modal" data-action="{{ route('professional.destroy',$professional) }}" data-name="{{$professional->names}} {{$professional->lastnames}}" data-toggle="modal" title="Eliminar" class="col-auto" href="">
                            <i class="fa fa-trash font-weight-bold text-dark"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$professionals->links()}}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('module')
{{__(' | Especialidad')}}
@endsection

@section('title')
{{__('Especialidades')}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-8 mt-3">
        @include('partials.success')
        <div class="row">
            <a href="{{ route('specialty.create') }}" class="btn btn-outline-success mx-2">Nueva especialidad</a>
        </div>
        <table class="table shadow table-striped p-5 mb-5 mt-3 rounded">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialties as $specialty)
                <tr>
                    <td>{{ $specialty->name }}</td>
                    <td>{{ $specialty->description }}</td>
                    <td>
                        @if ($specialty->active)
                        Activa
                        @else
                        Inactiva
                        @endif
                    </td>
                    <td class="row justify-content-center">
                        <a href="{{ route('specialty.show',$specialty) }}" title="Ver" class="col-auto">
                            <i class="fa fa-eye font-weight-bold text-dark"></i>
                        </a>
                        <a href="{{ route('specialty.edit',$specialty) }}" title="Editar" class="col-auto">
                            <i class="fa fa-edit font-weight-bold text-dark"></i>
                        </a>
                        <a data-target="#delete-modal" data-action="{{ route('specialty.destroy',$specialty) }}" data-name="{{$specialty->name}}" data-toggle="modal" title="Eliminar" class="col-auto" href="">
                            <i class="fa fa-trash font-weight-bold text-dark"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$specialties->links()}}
    </div>
</div>
@endsection

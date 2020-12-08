@extends('layouts.app')

@section('module')
{{__(' | Especialidad')}}
@endsection

@section('title')
{{ $specialty->name }}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-8 mt-5">
        <table class="table shadow table-striped p-5 mb-5 rounded">
            <tbody>
                <tr>
                    <th scope="row">Nombre</th>
                    <td>{{ $specialty->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Descripción</th>
                    <td>{{ $specialty->description }}</td>
                </tr>
                <tr>
                    <th scope="row">Estado</th>
                    <td>
                        @if ($specialty->active)
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
    <a href="{{ route('specialty.index') }}" class="btn btn-outline-secondary mx-3">Volver al listado</a>
    <a data-target="#delete-modal" data-action="{{route('specialty.destroy',$specialty)}}"
        data-name="{{$specialty->name}}" data-toggle="modal" href=""
        class="btn btn-outline-danger mx-3">
        Eliminar especialidad
    </a>
</div>

@endsection

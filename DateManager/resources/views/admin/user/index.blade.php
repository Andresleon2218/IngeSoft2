@extends('layouts.app')

@section('module')
{{__(' | Usuarios')}}
@endsection

@section('title')
{{__('Usuarios')}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-10 mt-5">
        @include('partials.success')
        <table class="table shadow table-striped p-5 mb-5 rounded">
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
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->document }}</th>
                    <td>{{ $user->names }}</td>
                    <td>{{ $user->lastnames }}</td>
                    <td>
                        @if ($user->active)
                        Activo
                        @else
                        Inactivo
                        @endif
                    </td>
                    <td class="row justify-content-center">
                        <a href="{{ route('client.show',$user) }}" title="Ver" class="col-auto">
                            <i class="fa fa-eye font-weight-bold text-dark"></i>
                        </a>
                        <a data-target="#delete-modal" data-action="{{ route('client.destroy',$user) }}" data-name="{{$user->names}} {{$user->lastnames}}" data-toggle="modal" title="Eliminar" class="col-auto" href="">
                            <i class="fa fa-trash font-weight-bold text-dark"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>
@endsection

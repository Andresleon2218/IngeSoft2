@extends('layouts.app')

@section('module')
    {{__(' | Profesional')}}
@endsection

@section('title')
    {{ $professional->names }} {{ $professional->lastnames}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 mt-5">
            <table class="table shadow table-striped p-5 mb-5 rounded">
                <tbody>
                  <tr>
                    <th scope="row">Número de documento</th>
                    <td>{{ $professional->document }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Nombres</th>
                    <td>{{ $professional->names }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Apellidos</th>
                    <td>{{ $professional->lastnames }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Correo electrónico</th>
                    <td>{{ $professional->email }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Número de celular</th>
                    <td>{{ $professional->phone }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Estado</th>
                    <td>
                        @if ($professional->active)
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
        <a data-target="#delete-modal" data-action="{{route('professional.destroy',$professional)}}" data-name="{{$professional->names}} {{$professional->lastnames}}" data-toggle="modal" href="" class="btn btn-outline-danger mx-3">
            Eliminar profesional
        </a>
    </div>

@endsection

@extends('layouts.app')

@section('module')
    {{__(' | Usuario')}}
@endsection

@section('title')
    {{ $client->names }} {{ $client->lastnames}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 mt-5">
            <table class="table shadow table-striped p-5 mb-5 rounded">
                <tbody>
                  <tr>
                    <th scope="row">Número de documento</th>
                    <td>{{ $client->document }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Nombres</th>
                    <td>{{ $client->names }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Apellidos</th>
                    <td>{{ $client->lastnames }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Correo electrónico</th>
                    <td>{{ $client->email }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Número de celular</th>
                    <td>{{ $client->phone }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Estado</th>
                    <td>
                        @if ($client->active)
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
        <a data-target="#delete-modal" data-action="{{route('client.destroy',$client)}}" data-name="{{$client->names}} {{$client->lastnames}}" data-toggle="modal" href="" class="btn btn-outline-danger mx-3">
            Eliminar usuario
        </a>
    </div>

@endsection

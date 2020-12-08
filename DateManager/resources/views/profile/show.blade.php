@extends('layouts.app')

@section('module')
    {{__(' | Perfil')}}
@endsection

@section('title')
    {{__('Mis datos')}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 mt-5">
            @include('partials.success')
            <table class="table shadow table-striped p-5 mb-5 rounded">
                <tbody>
                  <tr>
                    <th scope="row">Número de documento</th>
                    <td>{{ Auth::user()->document }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Nombres</th>
                    <td>{{ Auth::user()->names }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Apellidos</th>
                    <td>{{ Auth::user()->lastnames }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Correo electrónico</th>
                    <td>{{ Auth::user()->email }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Número de celular</th>
                    <td>{{ Auth::user()->phone }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <a class="btn btn-outline-secondary mx-3" href="{{ route('profile.edit') }}">Actualizar mis datos</a>
        <a data-target="#delete-modal" data-action="{{route('profile.delete')}}" data-name="{{Auth::user()->names}}" data-toggle="modal" href="" class="btn btn-outline-danger mx-3">
            Eliminar mi cuenta
        </a>
    </div>

@endsection

@extends('layouts.app')

@section('module')
    {{__(' | Perfil')}}
@endsection

@section('title')
    {{__('Actualización de datos')}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-7 card shadow-lg mt-5 p-5 rounded">
            <form class="row justify-content-center" action="{{ route('profile.update') }}" method="post">
                @method('PUT')
                @csrf

                <div class="form-group col-10">
                    <label>Número de documento</label>
                    <input type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document',Auth::user()->document) }}">
                    @error('document')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Nombres</label>
                    <input type="text" class="form-control @error('names') is-invalid @enderror" name="names" value="{{ old('names',Auth::user()->names) }}">
                    @error('names')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Apellidos</label>
                    <input type="text" class="form-control @error('lastnames') is-invalid @enderror" name="lastnames" value="{{ old('lastnames',Auth::user()->lastnames) }}">
                    @error('lastnames')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Correo electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',Auth::user()->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Número de celular</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',Auth::user()->phone) }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row justify-content-center">
                    <a href="{{ route('profile') }}" class="btn btn-outline-secondary m-2">Cancelar</a>
                    <input class="btn btn-outline-success m-2" type="submit" value="Actualizar">
                </div>

            </form>
        </div>
    </div>

@endsection

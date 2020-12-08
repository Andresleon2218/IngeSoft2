@extends('layouts.app')

@section('module')
    {{__(' | Profesional')}}
@endsection

@section('title')
    {{__('Registro de nuevo profesional')}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-7 card shadow-lg mt-5 p-5 rounded">
            <form class="row justify-content-center" action="{{ route('professional.store') }}" method="post">
                @csrf

                <div class="form-group col-10">
                    <label>Número de documento</label>
                    <input type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document') }}">
                    @error('document')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Nombres</label>
                    <input type="text" class="form-control @error('names') is-invalid @enderror" name="names" value="{{ old('names') }}">
                    @error('names')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Apellidos</label>
                    <input type="text" class="form-control @error('lastnames') is-invalid @enderror" name="lastnames" value="{{ old('lastnames') }}">
                    @error('lastnames')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Número de celular</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Correo electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Confirma tu contraseña</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                @foreach ($specialties as $specialty)
                <div class="form-check">
                    <input id="{{$specialty->name}}" type="checkbox" class="form-check-input" name="specialties[]" value="{{$specialty->id}}"
                        @if (old('specialties'))
                        @foreach (old('specialties') as $item)
                            @if ($specialty->id == $item)
                                checked
                                @break
                            @endif
                        @endforeach
                        @endif>
                    <label class="form-check-label font-weight-bold" for="{{$specialty->name}}">{{$specialty->name}} </label>
                    @if ($specialty->description)
                    <i class="fas fa-long-arrow-alt-right"></i> {{$specialty->description}}
                    @endif
                </div>
                @endforeach

                <div class="form-group row justify-content-center">
                    <a href="{{ route('professional.index') }}" class="btn btn-outline-secondary m-2">Cancelar</a>
                    <input class="btn btn-outline-success m-2" type="submit" value="Registrar">
                </div>

            </form>
        </div>
    </div>

@endsection

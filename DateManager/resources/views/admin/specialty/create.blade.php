@extends('layouts.app')

@section('module')
    {{__(' | Especialidad')}}
@endsection

@section('title')
    {{__('Registro de nueva especialidad')}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-7 card shadow-lg mt-5 p-5 rounded">
            <form class="row justify-content-center" action="{{ route('specialty.store') }}" method="post">
                @csrf

                <div class="form-group col-10">
                    <label>Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-10">
                    <label>Descripción</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"  name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                <div class="form-group row justify-content-center">
                    <a href="{{ route('specialty.index') }}" class="btn btn-outline-secondary m-2">Cancelar</a>
                    <input class="btn btn-outline-success m-2" type="submit" value="Registrar">
                </div>

            </form>
        </div>
    </div>

@endsection

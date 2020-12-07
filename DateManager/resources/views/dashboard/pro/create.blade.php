@extends('layouts.app')
@section('content')
    <form action="{{route('user.store')}}" method="post">
        @csrf

        <label for="document">Documento de identidad</label>
        <input type="text" name="document" id="document">

        <label for="names">Nombres</label>
        <input type="text" name="names" id="names">

        <label for="lastnames">Apellidos</label>
        <input type="text" name="lastnames" id="lastnames">

        <label for="email">Correo electrónico</label>
        <input type="text" name="email" id="email">

        <label for="password">Contraseña</label>
        <input type="text" name="password" id="password">

        <label for="phone">Telefono</label>
        <input type="text" name="phone" id="phone">

        <input type="submit" value="Enviar">
    </form>
    @foreach ($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@endsection

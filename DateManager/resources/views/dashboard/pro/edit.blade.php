<form method="post" action="{{ route('updatePro', $pro->id) }}">
    @method('PUT')
    @csrf

    <label for="document">Documento de identidad</label>
<input type="text" value="{{$pro->document}}" name="document" id="document">

    <label for="names">Nombres</label>
    <input type="text" value="{{$pro->names}}" name="names" id="names">

    <label for="lastnames">Apellidos</label>
    <input type="text" value="{{$pro->lastnames}}" name="lastnames" id="lastnames">

    <label for="email">Correo electrónico</label>
    <input type="text" value="{{$pro->email}}" name="email" id="email">


    <label for="phone">Telefono</label>
    <input type="text" value="{{$pro->phone}}" name="phone" id="phone">

    <input type="submit" value="Enviar">

    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
</form>

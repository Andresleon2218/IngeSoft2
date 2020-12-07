<form action="{{route('specialty.store')}}" method="post">
    @csrf

    <label for="document">Nombre de la especialidad</label>
    <input type="text" name="name" id="name">

    <label for="names">Descripcion</label>
    <textarea name="names" id="names" rows="6">
        {{ old('description', $specialty->description) }}
    </textarea>

    <input type="submit" value="Enviar">

    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
</form>


<table class="table">
    <thead>
        <tr>
            <td>Documento</td>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Correo</td>
            <td>Telefono</td>
            <td>Opciones</td>

        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{$client->document}}</td>
                <td>{{$client->names}}</td>
                <td>{{$client->lastnames}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->phone}}</td>
                <td>
                    <a href="{{ route('client.show', $client->id) }}" class="btn btn-outline-primary">Ver</a>
                    <a href="{{ route('client.edit', $client->id) }}" class="btn btn-outline-primary">Editar</a>
                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $client->id }}" class="btn btn-outline-danger">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $clients->links()}}


    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach

<table class="table">
    <thead>
        <tr>
            <td>Documento</td>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Correo</td>
            <td>Telefono</td>

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
            </tr>
        @endforeach
    </tbody>
</table>

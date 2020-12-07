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
        @foreach ($pros as $pro)
            <tr>
                <td>{{$pro->document}}</td>
                <td>{{$pro->names}}</td>
                <td>{{$pro->lastnames}}</td>
                <td>{{$pro->email}}</td>
                <td>{{$pro->phone}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

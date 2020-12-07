<a class="btn btn-success my-3" href="{{ route('specialty.create') }}">
    Nuevo registro
</a>

<table class="table">
    <thead>
        <tr>
            <td>Nombre</td>
            <td>ID</td>
            <td>Opciones</td>

        </tr>
    </thead>
    <tbody>
        @foreach ($specialties as $specialty)
            <tr>
                <td>{{$specialty->name}}</td>
                <td>{{$specialty->id}}</td>
                <td>
                    <a href="{{ route('specialty.show', $specialty->id) }}" class="btn btn-outline-primary">Ver</a>
                    <a href="{{ route('specialty.edit', $specialty->id) }}" class="btn btn-outline-primary">Editar</a>
                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $specialty->id }}" class="btn btn-outline-danger">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

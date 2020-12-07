<a class="btn btn-success my-3" href="{{ route('pro.create') }}">
    Nuevo registro
</a>

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
        @foreach ($pros as $pro)
            <tr>
                <td>{{$pro->document}}</td>
                <td>{{$pro->names}}</td>
                <td>{{$pro->lastnames}}</td>
                <td>{{$pro->email}}</td>
                <td>{{$pro->phone}}</td>
                <td>
                    <a href="{{ route('pro.show', $pro->id) }}" class="btn btn-outline-primary">Ver</a>
                    <a href="{{ route('pro.edit', $pro->id) }}" class="btn btn-outline-primary">Editar</a>
                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $pro->id }}" class="btn btn-outline-danger">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $pros->links()}}

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Seguro desea eliminar el registro seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form action="{{ route('user.destroy', 0)}}" id="formDelete" data-action="{{route('user.destroy', 0)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script>
      window.onload = function(){
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let action = $('#formDelete').attr('data-action').slice(0)
        action += id
        $('#formDelete').attr('action', action)
        let modal = $(this)
        modal.find('.modal-title').text('Vas a eliminar el usuario número ' + id)
    })
    }
</script>

    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach

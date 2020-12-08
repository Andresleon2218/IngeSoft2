<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Seguro que desea eliminar el registro seleccionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                <form method="POST" id="form-delete">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#delete-modal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget)
            let modal = $(this)
            modal.find('.modal-title').text(button.data('name'))
            $('#form-delete').attr('action',button.data('action'))
        })
    }
</script>

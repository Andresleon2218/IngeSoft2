<div class="form-group">
    <label for="name">Nombre</label>
    <input class="form-control" readonly type="text" name="name" id="name" value="{{$specialty->name }}">
</div>

<div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control" name="description" id="description" rows="5">
        {{ old('content', $specialty->description) }}
    </textarea>
</div>

<a href="{{ URL::previous()}}" class="btn btn-outline-secondary">Regresar</a>

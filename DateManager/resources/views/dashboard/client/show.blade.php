<div class="form-group">
    <label for="document">Documento</label>
    <input class="form-control" readonly type="text" name="document" id="document" value="{{$pro->document }}">
</div>

<div class="form-group">
    <label for="names">Nombres</label>
    <input class="form-control" readonly type="text" name="names" id="names" value="{{$pro->names }}">
</div>

<div class="form-group">
    <label for="lastnames">Apellidos</label>
    <input class="form-control" readonly type="text" name="lastnames" id="lastnames" value="{{$pro->lastnames }}">
</div>

<div class="form-group">
    <label for="document">Correo electronico</label>
    <input class="form-control" readonly type="text" name="email" id="email" value="{{$pro->email }}">
</div>

<div class="form-group">
    <label for="document">Telefono</label>
    <input class="form-control" readonly type="text" name="phone" id="phone" value="{{$pro->phone }}">
</div>

<a href="{{ URL::previous()}}" class="btn btn-outline-secondary">Regresar</a>

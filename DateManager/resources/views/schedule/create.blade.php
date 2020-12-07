<form action="{{route('schedule.store')}}" method="post">
    @csrf

    <label>Días</label>
    <input type="checkbox" name="days[]" id="monday" value="monday">
    <label for="monday">Lunes</label>
    <input type="checkbox" name="days[]" id="tuesday" value="tuesday">
    <label for="tuesday">Martes</label>
    <input type="checkbox" name="days[]" id="wednesday" value="wednesday">
    <label for="wednesday">Miércoles</label>
    <input type="checkbox" name="days[]" id="thursday" value="thursday">
    <label for="thursday">Jueves</label>
    <input type="checkbox" name="days[]" id="friday" value="friday">
    <label for="friday">Viernes</label>
    <input type="checkbox" name="days[]" id="saturday" value="saturday">
    <label for="saturday">Sábado</label>
    <input type="checkbox" name="days[]" id="sunday" value="sunday">
    <label for="sunday">Domingo</label>

    <label for="start_time">Hora de inicio</label>
    <input type="time" name="start_time" id="start_time">

    <label for="end_time">Hora de terminación</label>
    <input type="time" name="end_time" id="end_time">

    <label for="start_date">Fecha de inicio</label>
    <input type="date" name="start_date" id="start_date">

    <label for="end_date">Fecha de terminación</label>
    <input type="date" name="end_date" id="end_date">

    <label for="duration_of_date">Duración de cada cita</label>
    <input type="time" name="duration_of_date" id="duration_of_date">

    <input type="submit" value="Registrar">

    <!-- Esto se debería eliminar y en su lugar mostrar los errores de manera individual -->
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
    <!-- Aquí se termina lo que se debería quitar -->

</form>

<!-- Esto se debería colocar en otro archivo con el fin de ser reutilizado.-->
<!-- Es para mostrar los errores en caso de que el horario se solape con uno existente. -->
@if (session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        // Para que se muestre el error durante 3 segundos
        setTimeout(function(){$(".alert").alert("close")},3000)
    </script>
@endif
<!-- Aquí se termina la sección de mostrar los errores -->

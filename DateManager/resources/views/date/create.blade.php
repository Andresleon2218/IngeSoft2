<form action="{{route('dates.store')}}" method="POST">
    @csrf
    <label for="date">Fecha:</label>
    <input id='date' type="date" name="date">
    @error('date')
        <div>{{$message}}</div>
    @enderror
    <label for="start">Hora de inicio:</label>
    <input type="time" id="start" name="start">
    @error('start')
        <div>{{$message}}</div>
    @enderror
    <label for="end">Hora de fin:</label>
    <input type="time" id="end" name="end">
    @error('end')
        <div>{{$message}}</div>
    @enderror
    <label for="professional_id">Profesional:</label>
    <input type="text" id="professional_id" name="professional_id">
    @error('professional_id')
        <div>{{$message}}</div>
    @enderror
    <input type="submit" value="Enviar">
</form>

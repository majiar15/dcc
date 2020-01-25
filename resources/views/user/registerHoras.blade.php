@extends('layouts.modulo')

@section('content')
@include('includes.message')
<form  action="{{ route('horas.save') }}" method="post">
    @csrf
    <label for="NombreEvento">Nombre del evento</label>
    <br>
    <input type="text" name="nom_evento" >
<br>
<label for="voluntarios">Voluntarios Asistentes</label>
<br>
    <select class="js-example-basic-multiple" name="voluntarios[]" multiple >
      <option disabled>voluntarios</option>

  @foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name." ".$user->last_name}}</option>
  @endforeach
      </select>
      <br>
      <label for="fecha">Fecha del evento</label><br>
      <input type="date" name="date"><br>
    <label for="hora">hora de inicio</label><br>
    <input type="time" name="hora_inicio" value="05:00"><br>
    <label for="hora">hora de finalizacion</label><br>
    <input type="time" name="hora_final" value="23:00"><br>

    <input type="submit" value="enviar"><br>
</form>







@endsection

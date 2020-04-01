@extends('layouts.dashboard.index')
@section('content')
@include('includes.message')


<h1>Registro de operatividad</h1>

<form  action="{{ route('horas.save') }}" method="post" class="row-cols-lg-4">
    @csrf
    <div class="form-group">
        <label for="NombreEvento">Nombre del evento</label>
        <input type="text" name="nom_evento" class="form-control">
    </div>

 <div class="form-group">
        <label for="voluntarios">Voluntarios Asistentes</label>

        <select class="js-example-basic-multiple form-control" name="voluntarios[]" multiple >
            <option disabled>voluntarios</option>

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name." ".$user->last_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha del evento</label>
        <input type="date" name="date" class="form-control">
   </div>

   <div class="form-group">
        <label for="hora">hora de inicio</label>
        <input type="time" name="hora_inicio" value="05:00" class="form-control">
    
        <div class="form-group"></div>
        <label for="hora">hora de finalizacion</label>
        <input type="time" name="hora_final" value="23:00" class="form-control">
  </div>

    <div class="form-group">
        <input type="submit" value="enviar" class="btn btn-primary">
    </div>
    
</form>







@endsection

@extends('layouts.modulo')

@section('content')


@if (is_string($horas))
<h3 class="massage_month" >{{$horas}}</h3>
@else
<h3 class="massage_month" >Horas Registradas en el mes de {{$name_mes}} </h3>
<table border='1' id="hours">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Horas Trabajadas</th>
        </tr>
    </thead>
@foreach ($horas as $hora)

        <tr>
           <td>
            {{$hora['name']." ".$hora['last_name'] }}
           </td>
   
           <td>
           {{$hora['hours']}}
           </td>
        </tr>
@endforeach   
</table>

@endif



@endsection
@extends('layouts.modulo')

@section('content')


@if (is_string($horas))
<h3 class="massage_month" >{{$horas}}</h3>
@else
<h3 class="massage_month" >Horas Registradas en el mes de {{$name_mes}} </h3>

<table border='1' id="hours">
    <thead>
        <tr>
            <th>Asistentes</th>
            <th>Horas Asistidas totales</th>
            @foreach($eventos as $evento)
            <td>{{$evento->nom_evento}}<br>
                {{'('.$evento->fecha.')'}}
            </td>
            @endforeach
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



        @foreach($user_events as $user_event)
            @if($hora['id'] == $user_event->user_id)     

                @foreach($eventos as $evento)

                    @if (isset($advance) && $advance && $loop->index >= $index)
                                           
                        @if($evento->id == $user_event->event_id)

                            <td>{{$hora['name'].'-'.$evento->nom_evento.'-'.$user_event->user_id}}</td>

                            <!--<td>1</td>-->
                            @break
                            
                        @else                  
                            <td>0</td>
                            <?php
                                $advance=false;
                            ?>
                        @endif                        
                    @else

                        @if($evento->id == $user_event->event_id)

                            <td>{{$hora['name'].'-'.$evento->nom_evento.'-'.$user_event->user_id}}</td>

                            <!--<td>1</td>-->
                            <?php
                                $advance=true;
                                $index = $loop->index;  
                                
                            ?>
                            

                        @else                  
                            <td>0</td>
                            
                        @endif

                    @endif

                    
                    
                @endforeach

            @endif


        @endforeach

    </tr>
    @endforeach   
</table>

@endif



@endsection
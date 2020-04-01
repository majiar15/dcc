@extends('layouts.dashboard.index')

@section('content')

<style>
     td:hover > div{
        display: block!important;

    }
</style>
@if (is_string($horas))
<h1 >{{$horas}}</h1>
@else
<h1>Operatividad JDC chiquinquira {{$name_mes}} </h1>
<div class="row">
    <div class="table-responsive col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <table  id="hours" class="table table-hover">
             <thead class="thead-light">
                <tr>
                    <th><center>Voluntarios</center></th>
                    <th><center>Horas Asistidas totales</center></th>

                    <th colspan="4"  ><center>Eventos</center></th>

                </tr>

            </thead>
        <tbody>
            @foreach ($horas as $hora)

            <tr>
                <td> 
                    <center>{{$hora['name']." ".$hora['last_name'] }}</center>
                </td>

                <td>
                   <center> {{$hora['hours']}}</center>
                </td>

                @php
                $iterador = 0;
                @endphp

                @foreach($user_events as $user_event)
                    @if($hora['id'] == $user_event->user_id)     

                        @foreach($eventos as $evento)



                                @if($evento->id == $user_event->event_id)

                                    @php
                                    $iterador++;

                                    @endphp

                                    <td> 
                                        <center>{{$evento->nom_evento}} </center>

                                        <div class="card d-none position-absolute" style="width: 14rem;">
                                            <div class="card-body ">
                                              <h5 class="card-title">{{$evento->nom_evento}}</h5>
                                              <p class="card-text">{{'fecha:'.$evento->fecha}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    
                                @endif





                        @endforeach 



                    @endif



                @endforeach
                @if($loop->index ==0)
                    @php
                        $max = $iterador;
                    @endphp
                @endif
               <?php


                    if($iterador < $max){
                        for($i = $iterador; $i < $max ;$i++){
                            echo "<td> <center> - </center></td>";
                        }
                    }



              ?>

            </tr>
            @endforeach   
            </tbody>
        </table>
    </div>
</div>
@endif



@endsection
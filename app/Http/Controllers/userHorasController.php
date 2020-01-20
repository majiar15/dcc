<?php

namespace App\Http\Controllers;

use App\user_hora;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class userHorasController extends Controller
{
       public function __construct() {
        $this->middleware('auth');
    }

    public function getAll($mes){
    switch ($mes){
        case 1:
             $name_month ="Enero";
            break;
        case 2:
            $name_month ="Febrero";
            break;
        case 3:
            $name_month ="Marzo";
            break;
        case 4:
            $name_month ="Abril";
            break;
        case 5:
            $name_month ="Mayo";
            break;
        case 6:
            $name_month="Junio";
            break;
        case 7:
            $name_month ="Julio";
            break;
        case 8:
            $name_month ="Agosto";
            break;
        case 9:
            $name_month ="Septiembre";
            break;
        case 10:
            $name_month ="Octubre";
            break;
        case 11:
            $name_month="Noviembre";
            break;
        case 12:
            $name_month="Diciembre";
            break;

        }
        if(auth()->user()->role =='admin'){
            $userHoras = DB::select(
                "select u.id, u.name,u.last_name , (h.hora_inicio) , (h.hora_final) from users u , user_horas uh , horas h where u.id = uh.user_id and h.id = uh.horas_id and uh.mes = {$mes} Order By(u.id)"
                );
        }else{
            $id = auth()->user()->id;

            $userHoras = DB::select(
                "select u.id, u.name,u.last_name , (h.hora_inicio) , (h.hora_final) from users u , user_horas uh , horas h where u.id = uh.user_id and h.id = uh.horas_id and u.id ={$id} and uh.mes = {$mes} Order By(u.id)"
                );
        }
        
        
         function getDiff($HF , $HI){
            $date1 = new \DateTime($HI);           
            $date2 = new \DateTime($HF);
            $interval = $date1->diff($date2);

            $interval= $interval->format('%H : %i');
            return (int) $interval;
        }
        function array_sort_by(&$arrIni, $col, $order = SORT_DESC){
            $arrAux = array();
            foreach ($arrIni as $key=> $row)
            {
                $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
                $arrAux[$key] = strtolower($arrAux[$key]);
            }
             return array_multisort($arrAux, $order, $arrIni);
        }
if(empty($userHoras) && auth()->user()->role =='admin'){
    $horas_volunter= 'no hay horas registradas en el mes de '.$name_month.' del '.date('Y');
}
elseif(empty($userHoras)){
    $horas_volunter= 'no hay horas registradas de '.auth()->user()->name.' '.auth()->user()->last_name.' en el mes '.$name_month;
}else{
     
        $id=1;
        $hTotal=0;
        $horas_volunter;
        
        foreach($userHoras as $u){
            
            if($u->id == $id){
                $hTotal += getDiff($u->hora_final , $u->hora_inicio);
                $name = $u->name;
                $last_name = $u->last_name;
               }else{

                   if($hTotal!=0){
                    
                    $horas_volunter[$u->id] = [
                        'name' => $name,
                        'last_name' => $last_name,
                        'hours' => $hTotal
                    ]; 
                    
                   }

                   $hTotal=0;
                   $id= $u->id;
                   $name = $u->name;
                   $last_name = $u->last_name;
                   $hTotal += getDiff($u->hora_final , $u->hora_inicio);
               }
               
               if(end($userHoras) == $u){
                
                $horas_volunter[$u->id-1] = [
                    'name' => $u->name,
                    'last_name' => $u->last_name,
                    'hours' => $hTotal
                ];                
               }
           //end foreach
        }
        
        array_sort_by($horas_volunter, 'hours' ,$order = SORT_DESC);

    }

        

        return view('user.verHoras' , [
            'mes' => $mes,
            'name_mes' => $name_month,
            'horas' => $horas_volunter
        ]);
        }
    }

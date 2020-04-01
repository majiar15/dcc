<?php

namespace App\Http\Controllers;

use App\user_event;
use App\events;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userHorasController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function getAll($mes) {
        //funciones 
        if($mes ==2){
            $semestre = date("Y").' - 2';
        }else{
            $semestre = date("Y").' - 1';
        }
        switch ($mes) {
            case 1:
                $name_month = "Enero";
                break;
            case 2:
                $name_month = "Febrero";
                break;
            case 3:
                $name_month = "Marzo";
                break;
            case 4:
                $name_month = "Abril";
                break;
            case 5:
                $name_month = "Mayo";
                break;
            case 6:
                $name_month = "Junio";
                break;
            case 7:
                $name_month = "Julio";
                break;
            case 8:
                $name_month = "Agosto";
                break;
            case 9:
                $name_month = "Septiembre";
                break;
            case 10:
                $name_month = "Octubre";
                break;
            case 11:
                $name_month = "Noviembre";
                break;
            case 12:
                $name_month = "Diciembre";
                break;
        }

        function array_sort_by(&$arrIni, $col, $order = SORT_DESC) {
            $arrAux = array();
            foreach ($arrIni as $key => $row) {
                $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
                $arrAux[$key] = strtolower($arrAux[$key]);
            }
            return array_multisort($arrAux, $order, $arrIni);
        }

        function getDiff($HF, $HI) {
            $date1 = new \DateTime($HI);
            $date2 = new \DateTime($HF);
            $interval = $date1->diff($date2);

            $interval = $interval->format('%H : %i');
            return (int) $interval;
        }

        //consultas
        $userEvent = DB::select(
                        "select u.id, u.name,u.last_name , (e.hora_inicio) , (e.hora_final),ue.event_id from users u , user_event ue , events e where u.id = ue.user_id and e.id = ue.event_id  Order By(u.id)"
        );
        $array_eventos = DB::select(
                        "SELECT * FROM events"
        );
        $user_evets = DB::select(
                        "SELECT * FROM user_event order by(event_id)"
        );
        
        if(empty($userEvent)){
            $horas_volunter = "no hay registro de operatividad";
            return view('user.verHoras', [
                
                'horas' => $horas_volunter,
                
        ]);
        }else{

            $id = 1;
            $hTotal = 0;
            $horas_volunter;

            foreach ($userEvent as $u) {

                if ($u->id == $id) {

                    $hTotal += getDiff($u->hora_final, $u->hora_inicio);
                    $name = $u->name;
                    $last_name = $u->last_name;
                } else {

                    if ($hTotal != 0) {

                        $horas_volunter[$u->id - 1] = [
                            'id' => $id,
                            'name' => $name,
                            'last_name' => $last_name,
                            'hours' => $hTotal,
                        ];
                    }

                    $hTotal = 0;
                    $id = $u->id;
                    $name = $u->name;
                    $last_name = $u->last_name;
                    $hTotal += getDiff($u->hora_final, $u->hora_inicio);
                }

                if (end($userEvent) == $u) {

                    $horas_volunter[$u->id] = [
                        'id' => $id,
                        'name' => $u->name,
                        'last_name' => $u->last_name,
                        'hours' => $hTotal,
                    ];
                }
                //end foreach
            }

            array_sort_by($horas_volunter, 'hours', $order = SORT_DESC);
        


        $aux = array();



        $user_id_identity;


        return view('user.verHoras', [
            'mes' => $mes,
            'name_mes' => $semestre,
            'horas' => $horas_volunter,
            'eventos' => $array_eventos,
            'user_events' => $user_evets
        ]);
    }
    }
}

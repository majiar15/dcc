<?php

namespace App\Http\Controllers;

use App\hora;
use App\user_hora;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HoraController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        

        $validate = \Validator::make($request->all(), [
                    'nom_evento' => 'required|string|max:255',
                    'voluntarios' => 'required|array',
                    'hora_inicio' => 'required|string|max:255',
                    'date' => 'date',
                    'hora_final' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return redirect()->route('horas')->with(['error' => 'Datos invalidos!!']);
        } else {
            $nameEvent = $request->input('nom_evento');
            $volunter = $request->input('voluntarios');
            $date = $request->input('date');
            
            $hora_inicio = $request->input('hora_inicio');
            $hora_final = $request->input('hora_final');
            $hora = new hora();
            $hora->nom_evento = $nameEvent;
            $hora->fecha = $date;
            $hora->hora_inicio = $hora_inicio;
            $hora->hora_final = $hora_final;

            $hora->save();


            $user_hora = new user_hora;
            foreach ($volunter as $voluntario) {
                $user_hora->user_id = (int) $voluntario;
                $user_hora->horas_id = $hora->id;
                $insert = user_hora::create(
                                [ 'user_id' => $user_hora->user_id,
                                    'event_id' => $user_hora->horas_id,
                                    'mes' => date("n",strtotime($date))
                ]);
            }
            return redirect()->route('horas')->with(['message' => 'las horas de los voluntarios han sido ingresadas correctamente!!']);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function show(hora $hora) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function edit(hora $hora) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hora $hora) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hora  $hora
     * @return \Illuminate\Http\Response
     */
    public function destroy(hora $hora) {
        //
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hora extends Model
{
    protected $table = 'horas';

    protected $fillable = [
       'id','nom_evento', 'hora_inicio','hora_final'
    ];



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hora extends Model
{
    protected $table = 'events';

    protected $fillable = [
       'id','nom_evento','fecha','hora_inicio','hora_final'
    ];



}

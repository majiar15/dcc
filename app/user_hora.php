<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_hora extends Model
{
    protected $table = 'user_horas';

    protected $fillable = [
       'user_id','horas_id','mes'
    ];
    


}

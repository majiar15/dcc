<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_hora extends Model
{
    protected $table = 'user_event';

    protected $fillable = [
       'user_id','event_id','mes'
    ];
    


}

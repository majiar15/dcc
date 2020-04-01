<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
     protected $table = 'posts';

    protected $fillable = [
       'user_id','category_id','name','description','image',
    ];
    
    public function scopeIdDescending($query){
        return $query->orderBy('id','DESC');
    }
}

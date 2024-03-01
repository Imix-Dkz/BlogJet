<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    //Relación 1:N, uno a muchos
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Esta es una tabla polimorfica...
    public function commentable(){
        return $this->morphTo();
    }
}

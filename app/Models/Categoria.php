<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //Relación 1:N, Uno a muchos
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    //Relación N:1, Muchos a uno
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Relación N:1, Muchos a Uno
    public function post(){
        return $this->belongsTo('App\Models\User');
    }

    //Relación 1:1, Uno a Uno, POLIMORFICA
    public function image()
    { //Ya que será variable el origen de solicitud de URLs de imagenes para los usuarios, se hará de la siguiente forma
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relacion 1:N, Uno a Muchos POLIMORFICA
    public function comments(){
        return $this->morphMany('App\Models\Commentable', 'commentable');
    }
    //Relacion N:N, Muchos a Muchos POLIMORFICA
    public function posts(){
        return $this->morphMany('App\Models\Taggable', 'taggable');
    }
}

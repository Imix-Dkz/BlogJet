<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    //Relación N:1, Muchos a Uno
    public function user(){
        return $this->belongsTo('App\Models\User');
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

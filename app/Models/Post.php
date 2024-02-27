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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    //Relación muchos a muchos
    public function roles(){
        return $this->belongsTo('App\Model\Role');
    }
}

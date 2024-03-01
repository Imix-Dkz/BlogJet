<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //El siguiente comando, indica la inserción masiva de datos
    protected $guarded = [];
    
    use HasFactory;

    //Para indicar la POLIMORFIA UNO A UNO...
    public function imageable(){
        return $this->morphTo();
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //Relación 1:1, Uno a Uno
    public function profile()
    { //Se añade una función para recuperar los datos de perfil del usuario

        //Este ejemplo inmediato es por selección con WHERE de los datos
        //$profile = Profile::where('user_id', $this->id)->first();
        //return $profile;

        //El siguiente es lo mismo pero con funcionalidad optimizada
        //return $this->hasOne(Profile::class);
        return $this->hasOne('App\Models\Profile'); //Es lo mismo que el anterior, ambas son validas
        //return $this->hasOne('App\Models\Profile', 'foreign_key', 'local_key'); 
        //Esto último en caso de que tengan nombres fuera de las convenciones, pero no deberia de dar problemas
    }

    //Relación 1:N, Uno a muchos
    public function posts(){ //Un usuario puede tener varios post
        return $this->hasMany('App\Models\Post');
    }
    public function videos(){ //Un usuario puede tener varios videos
        return $this->hasMany('App\Models\Video');
    }
    public function comments(){ //Un usuario puede tener varios videos
        return $this->hasMany('App\Models\Comments');
    }

    //Relación N:1, Muchos a Uno
    public function post(){ //Muchos post pueden pertenecer a un usuario
        return $this->belongsTo('App\Models\User');
    }

    //Relación N:N, Muchos a muchos...
    public function roles(){ //Muchos usuarios pueden poser varios roles
        return $this->belongsToMany('App\Models\Role');
    }

    //Relación 1:1, Uno a Uno, POLIMORFICA
    public function image()
    { //Ya que será variable el origen de solicitud de URLs de imagenes para los usuarios, se hará de la siguiente forma
        return $this->morphOne('App\Models\Image', 'imageable');
    }

}

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

    //Relación 1:1
    public function profile()
    { //Se añade una función para recuperar los datos de perfil del usuario

        //Este ejemplo inmediato es por selección con WHERE de los datos
        //$profile = Profile::where('user_id', $this->id)->first();
        //return $profile;

        //El siguiente es lo mismo pero con funcionalidad optimizada
        //return $this->hasOne(Profile::class);
        return $this->hasOne('App\Models\Profile'); //Es lo mismo que el anterior, ambas son validas
        //return $this->hasOne('App\Models\Profile', 'foreign_key', 'local_key'); //En caso de que tengan nombres fuera de las convenciones, no deberia de dar problemas
    }

}

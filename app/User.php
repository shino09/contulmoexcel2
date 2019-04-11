<?php

namespace SIS;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    protected $fillable = [
        'nombre', 'nickname', 'password', 'estado',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value);
    }

    public function setPasswordAttribute($value)
    {
        if(!empty($value))
            $this->attributes['password'] = \Hash::make($value);
    }

    /**
     * Darle nombre al estado dependiendo de la letra
     *
     * A: ACTIVO
     * D: INACTIVO
     *
     */
    public function getFullEstadoAttribute()
    {
        return $this->estado=='A' ? 'ACTIVO' : 'INACTIVO';
    }
}

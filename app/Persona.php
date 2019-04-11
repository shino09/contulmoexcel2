<?php

namespace SIS;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Persona extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    protected $fillable = [
        'nombre', 'apellido', 'telefono','fecha','file','ruta',
    ];

   

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value);
    }

    

   
}

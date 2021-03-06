<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Encargo extends Model
{
    protected $fillable = [
    			'albaran', 'destinatario',
				'direccion', 'poblacion',
				'cp', 'provincia', 'telefono',
				'observaciones', 'fecha',
    		];
    protected $table = 'encargos';

    //protected $timestamp = false;
}

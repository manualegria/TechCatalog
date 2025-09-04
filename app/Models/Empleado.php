<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;


    protected $table = 'employees';

    protected $fillable = [
        'numero_empleado',
        'codigo_interno',
        'lugar_trabajo',
        'nivel_riesgo',
        'fecha_ingreso',
        'sexo',
        'nombres',
        'apellidos',
        'cedula',
        'lugar_nacimiento',
        'lugar_expedicion',
        'fecha_nacimiento',
        'rh',
        'edad',
        'correo',
        'correo_corporativo',
        'direccion',
        'barrio',
        'celular',
        'cargo',
        'area',
        'tipo_contrato',
        'eps',
        'afp',
        'arl',
        'cesantias',
        'caja_compensacion',
        'nombre_familiar_1',
        'parentesco_1',
        'telefono_familiar_1',
        'nombre_familiar_2',
        'parentesco_2',
        'telefono_familiar_2',
        'observaciones',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }
}

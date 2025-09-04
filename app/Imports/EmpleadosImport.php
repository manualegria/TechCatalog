<?php

namespace App\Imports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class EmpleadosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Empleado([
            'numero_empleado'     => $row['numero_empleado'] ?? null,
            'codigo_interno'      => $row['codigo_interno'] ?? null,
            'lugar_trabajo'       => $row['lugar_trabajo'] ?? null,
            'nivel_riesgo'        => $row['nivel_riesgo'] ?? null,
            'fecha_ingreso'       => $this->parseDate($row['fecha_ingreso'] ?? null),
            'sexo'                => $row['sexo'] ?? null,
            'nombres'             => $row['nombres'] ?? null,
            'apellidos'           => $row['apellidos'] ?? null,
            'cedula'              => preg_replace('/[^0-9]/', '', $row['cedula'] ?? null),
            'lugar_nacimiento'    => $row['lugar_nacimiento'] ?? null,
            'lugar_expedicion'    => $row['lugar_expedicion'] ?? null,
            'fecha_nacimiento'    => $this->parseDate($row['fecha_nacimiento'] ?? null),
            'rh'                  => $row['rh'] ?? null,
            'edad'                => $row['edad'] ?? null,
            'correo'              => $row['correo'] ?? null,
            'correo_corporativo'  => $row['correo_corporativo'] ?? null,
            'direccion'           => $row['direccion'] ?? null,
            'barrio'              => $row['barrio'] ?? null,
            'celular'             => $row['celular'] ?? null,
            'cargo'               => $row['cargo'] ?? null,
            'area'                => $row['area'] ?? null,
            'tipo_contrato'       => $row['tipo_contrato'] ?? null,
            'eps'                 => $row['eps'] ?? null,
            'afp'                 => $row['afp'] ?? null,
            'arl'                 => $row['arl'] ?? null,
            'cesantias'           => $row['cesantias'] ?? null,
            'caja_compensacion'   => $row['caja_compensacion'] ?? null,
            'nombre_familiar_1'   => $row['nombre_familiar_1'] ?? null,
            'parentesco_1'        => $row['parentesco_1'] ?? null,
            'telefono_familiar_1' => $row['telefono_familiar_1'] ?? null,
            'nombre_familiar_2'   => $row['nombre_familiar_2'] ?? null,
            'parentesco_2'        => $row['parentesco_2'] ?? null,
            'telefono_familiar_2' => $row['telefono_familiar_2'] ?? null,
            'observaciones'       => $row['observaciones'] ?? null,
        ]);
    }

    private function parseDate($value)
    {
        try {
            if (is_numeric($value)) {
                return Carbon::instance(
                    \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)
                )->format('Y-m-d');
            }
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}

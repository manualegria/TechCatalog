@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Detalle del Empleado</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Empleados</a></li>
            <li class="breadcrumb-item active">{{ $empleado->full_name }}</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Información del Empleado</h5>

        <table class="table table-bordered">
            <tr><th>Numero Empleado</th><td>{{ $empleado->numero_empleado }}</td></tr>
            <tr><th>Codigo Interno</th><td>{{ $empleado->codigo_interno }}</td></tr>
            <tr><th>Lugar Trabajo</th><td>{{ $empleado->lugar_trabajo }}</td></tr>
            <tr><th>Nivel Riesgo</th><td>{{ $empleado->nivel_riesgo }}</td></tr>
            <tr><th>Fecha Ingreso</th><td>{{ $empleado->fecha_ingreso }}</td></tr>
            <tr><th>sexo</th><td>{{ $empleado->sexo }}</td></tr>
            <tr><th>Nombres</th><td>{{ $empleado->nombres }}</td></tr>
            <tr><th>Apellidos</th><td>{{ $empleado->apellidos }}</td></tr>
            <tr><th>Cédula</th><td>{{ $empleado->cedula }}</td></tr>
            <tr><th>Lugar Nacimiento</th><td>{{ $empleado->lugar_nacimiento }}</td></tr>
            <tr><th>Lugar Expedicion</th><td>{{ $empleado->lugar_expedicion }}</td></tr>
            <tr><th>Fecha Facimiento</th><td>{{ $empleado->fecha_nacimiento }}</td></tr>
            <tr><th>RH</th><td>{{ $empleado->rh }}</td></tr>
            <tr><th>Edad</th><td>{{ $empleado->edad }}</td></tr>
            <tr><th>Correo</th><td>{{ $empleado->correo }}</td></tr>
            <tr><th>Correo Corporatrivo</th><td>{{ $empleado->correo_corporativo }}</td></tr>
            <tr><th>Direccion</th><td>{{ $empleado-> direccion}}</td></tr>       
            <tr><th>Barrio</th><td>{{ $empleado->barrio }}</td></tr>       
            <tr><th>Celular</th><td>{{ $empleado->celular }}</td></tr>
            <tr><th>Dirección</th><td>{{ $empleado->direccion }}</td></tr>
            <tr><th>Barrio</th><td>{{ $empleado->barrio }}</td></tr>
            <tr><th>Cargo</th><td>{{ $empleado->cargo }}</td></tr>
            <tr><th>Área</th><td>{{ $empleado->area }}</td></tr>
            <tr><th>Tipo Contrato</th><td>{{ $empleado->tipo_contrato }}</td></tr>
            <tr><th>EPS</th><td>{{ $empleado->eps }}</td></tr>
            <tr><th>AFP</th><td>{{ $empleado->afp }}</td></tr>
            <tr><th>ARL</th><td>{{ $empleado->arl }}</td></tr>
            <tr><th>Cesantías</th><td>{{ $empleado->cesantias }}</td></tr>
            <tr><th>caja Compensacion</th><td>{{ $empleado->caja_compensacion }}</td></tr>
            <tr><th>Nombre amiliar_1</th><td>{{ $empleado->nombre_familiar_1 }}</td></tr>
            <tr><th>parentesco_1</th><td>{{ $empleado->parentesco_1 }}</td></tr>
            <tr><th>telefono_familiar_1</th><td>{{ $empleado->telefono_familiar_1 }}</td></tr>
            <tr><th>nombre_familiar_2</th><td>{{ $empleado->nombre_familiar_2 }}</td></tr>
            <tr><th>parentesco_2</th><td>{{ $empleado->parentesco_2 }}</td></tr>
            <tr><th>telefono_familiar_2</th><td>{{ $empleado->telefono_familiar_2 }}</td></tr>
            <tr><th>Observaciones</th><td>{{ $empleado->observaciones }}</td></tr>
            {{-- Agrega los demás campos que necesites --}}
        </table>

        <div class="text-end">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection

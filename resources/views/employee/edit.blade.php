@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Empleados</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Empleados</a></li>
            <li class="breadcrumb-item active">Editar Empleado</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar Empleado</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario para editar un empleado. La acción apunta a la ruta de actualización y se usa el método PUT --}}
            <form action="{{ route('employees.update', $empleado->id) }}" method="POST">
              @csrf
              @method('PUT') {{-- Directiva para que Laravel interprete la solicitud como PUT --}}
                
                <!-- Información Básica -->
                <div class="col-md-6">
                    <div class="form-floating">
                        {{-- El campo 'numero_empleado' se pre-rellena con el valor existente del empleado o el valor antiguo si hay un error de validación --}}
                        <input name="numero_empleado" type="text" class="form-control" placeholder="Número de Empleado" value="{{ old('numero_empleado', $empleado->numero_empleado) }}" required>
                        <label>Número de Empleado</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="codigo_interno" type="text" class="form-control" placeholder="Código Interno" value="{{ old('codigo_interno', $empleado->codigo_interno) }}">
                        <label>Código Interno</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="lugar_trabajo" type="text" class="form-control" placeholder="Lugar Trabajo" value="{{ old('lugar_trabajo', $empleado->lugar_trabajo) }}">
                        <label>lugar de Trabajo</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="nivel_riesgo" type="text" class="form-control" placeholder="Nivel de Riesgo" value="{{ old('nivel_riesgo', $empleado->nivel_riesgo) }}" required>
                        <label>Nivel de Riesgo</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="fecha_ingreso" type="date" class="form-control" placeholder="Fecha de Ingreso" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}" required>
                        <label>Fecha de Ingreso</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="sexo"  class="form-control"  required>
                            <option value="">Seleccione...</option>
                            <option value="M" {{ old('sexo', $empleado->sexo ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo', $empleado->sexo ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        <label>Sexo</label>
                    </div>
                </div>
                
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="nombres" type="text" class="form-control" placeholder="Nombres" value="{{ old('nombres', $empleado->nombres) }}" required>
                        <label>Nombres</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="apellidos" type="text" class="form-control" placeholder="Apellidos" value="{{ old('apellidos', $empleado->apellidos) }}" required>
                        <label>Apellidos</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="cedula" type="text" class="form-control" placeholder="Cédula" value="{{ old('cedula', $empleado->cedula) }}" required>
                        <label>Cédula</label>
                    </div>
                </div>
                
                <!-- <div class="col-md-6">
                    <div class="form-floating">
                        <select name="sexo" class="form-control" required>
                            <option value="">Seleccione...</option>
                            {{-- Se marca 'selected' si el valor actual del empleado o el valor antiguo coincide con la opción --}}
                            <option value="M" {{ old('sexo', $empleado->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo', $empleado->sexo) == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        <label>Sexo</label>
                    </div>
                </div> -->
                
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="lugar_nacimiento" type="text" class="form-control" placeholder="Lugar de Nacimiento" value="{{ old('lugar_nacimiento', $empleado->lugar_nacimiento) }}" required>
                        <label>Lugar de Nacimiento</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="lugar_expedicion" type="text" class="form-control" placeholder="Lugar de Expedicion" value="{{ old('lugar_nacimiento') }}" required>
                        <label>Lugar de Expedición</label>
                    </div>
                </div>
                
                   <!-- Información Personal -->
                   <div class="col-md-6">
                    <div class="form-floating">
                        <input name="fecha_nacimiento" type="date" class="form-control" placeholder="Fecha de Nacimiento" value="{{ old('fecha_nacimiento',$empleado->fecha_nacimiento) }}" required>
                        <label>Fecha de Nacimiento</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="rh" type="text" class="form-control" placeholder=" Grupo Sanguineo " value="{{ old('rh', $empleado->rh) }}" required>
                        <label>Grupo Sanguineo</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="edad" type="text" class="form-control" placeholder="Edad" value="{{ old('edad', $empleado->edad) }}" required>
                        <label>Edad</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="correo" type="email" class="form-control" placeholder="Correo Electrónico" value="{{ old('correo', $empleado->correo) }}" required>
                        <label>Correo Electrónico</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="correo_corporativo" type="email" class="form-control" placeholder="Correo Corporativo" value="{{ old('correo_corporativo', $empleado->correo_corporativo) }}" required>
                        <label>Correo Corporativo</label>
                    </div>
                </div>


                <!-- Información Personal -->
             
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="direccion" type="text" class="form-control" placeholder="Dirección" value="{{ old('direccion', $empleado->direccion) }}" required>
                        <label>Dirección</label>
                    </div>
                </div>

                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="barrio" type="text" class="form-control" placeholder="Barrio" value="{{ old('barrio', $empleado->barrio) }}" required>
                        <label>Barrio</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="celular" type="text" class="form-control" placeholder="Celular" value="{{ old('celular', $empleado->celular) }}" required>
                        <label>Celular</label>
                    </div>
                </div>

                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="cargo" type="text" class="form-control" placeholder="Cargo" value="{{ old('cargo', $empleado->cargo) }}" required>
                        <label>Cargo</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="area" type="text" class="form-control" placeholder="Area" value="{{ old('area', $empleado->area) }}" required>
                        <label>Area</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="tipo_contrato" type="text" class="form-control" placeholder="Tipo de Contrato" value="{{ old('tipo_contrato', $empleado->tipo_contrato) }}" required>
                        <label>Tipo de Contrato</label>
                    </div>
                </div>

                   <!-- Información de Seguridad Social -->
                   <div class="col-md-6">
                    <div class="form-floating">
                        <input name="eps" type="text" class="form-control" placeholder="EPS" value="{{ old('eps', $empleado->eps) }}" required>
                        <label>EPS</label>
                    </div>
                </div>
                
                 
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="afp" type="text" class="form-control" placeholder="AFP" value="{{ old('afp', $empleado->afp) }}" required>
                        <label>AFP</label>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="arl" type="text" class="form-control" placeholder="ARL" value="{{ old('arl', $empleado->arl) }}" required>
                        <label>ARL</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="cesantias" type="text" class="form-control" placeholder="Cesantías" value="{{ old('cesantias', $empleado->cesantias) }}" required>
                        <label>Cesantías</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="caja_compensacion" type="text" class="form-control" placeholder="Caja de Compensación" value="{{ old('caja_compensacion', $empleado->caja_compensacion) }}" required>
                        <label>Caja de Compensación</label>
                    </div>
                </div>                      
                
                <!-- Contactos de Emergencia -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="nombre_familiar_1" type="text" class="form-control" placeholder="Nombre Familiar 1" value="{{ old('nombre_familiar_1', $empleado->nombre_familiar_1) }}" required>
                        <label>Nombre Familiar 1</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="parentesco_1" type="text" class="form-control" placeholder="Parentesco 1" value="{{ old('parentesco_1', $empleado->parentesco_1) }}" required>
                        <label>Parentesco 1</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="telefono_familiar_1" type="text" class="form-control" placeholder="Teléfono Familiar 1" value="{{ old('telefono_familiar_1', $empleado->telefono_familiar_1) }}" required>
                        <label>Teléfono Familiar 1</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="nombre_familiar_2" type="text" class="form-control" placeholder="Nombre Familiar 2" value="{{ old('nombre_familiar_2', $empleado->nombre_familiar_2) }}">
                        <label>Nombre Familiar 2</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="parentesco_2" type="text" class="form-control" placeholder="Parentesco 2" value="{{ old('parentesco_2', $empleado->parentesco_2) }}">
                        <label>Parentesco 2</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="telefono_familiar_2" type="text" class="form-control" placeholder="Teléfono Familiar 2" value="{{ old('telefono_familiar_2', $empleado->telefono_familiar_2) }}">
                        <label>Teléfono Familiar 2</label>
                    </div>
                </div>
                
                <!-- Observaciones -->
                <div class="col-12">
                    <div class="form-floating">
                        {{-- El textarea también se pre-rellena con el valor existente --}}
                        <textarea name="observaciones" class="form-control" placeholder="Observaciones" style="height: 100px;"> {{ old('observaciones', $empleado->observaciones) }}</textarea>
                        <label>Observaciones</label>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>

</section>

@endsection

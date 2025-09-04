@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Nuevo Equipo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('equipos.index') }}">Equipos</a></li>
            <li class="breadcrumb-item active">Nuevo Equipo</li>
        </ol>
    </nav>
</div>

<section class="equipo dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nuevo Equipo</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="row g-3" action="{{ route('equipos.store')}}" method="POST" id="equipoForm">
                @csrf
                
                <!-- Información básica del equipo -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="owner" class="form-control" placeholder="Propietario" value="{{ old('owner') }}" required>
                        <label>Propietario</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="brand" class="form-control" placeholder="Marca" value="{{ old('brand') }}" required>
                        <label>Marca</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="model" class="form-control" placeholder="Modelo" value="{{ old('model') }}" required>
                        <label>Modelo</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="serial" class="form-control" placeholder="Serial" value="{{ old('serial') }}" required>
                        <label>Serial</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="specifications" class="form-control" placeholder="Especificaciones" value="{{ old('specifications') }}" required>
                        <label>Especificaciones</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="type" class="form-control" placeholder="Tipo" value="{{ old('type') }}" required>
                        <label>Tipo</label>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-control" name="area_id">
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                        <label>Área</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-control" name="campuses_id">
                            @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                            @endforeach
                        </select>
                        <label>Sede</label>
                    </div>
                </div>

                <!-- Sección de Periféricos -->
                <div class="col-12">
                    <h5 class="mt-4 mb-3">Periféricos</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="peripheralsTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Serial</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Fila inicial para periférico -->
                                <tr>
                                    <td>
                                        <select name="peripherals[0][type]" class="form-control" required>
                                            <option value="">Seleccione tipo</option>
                                            <option value="Monitor">Monitor</option>
                                            <option value="Monitor">Diadema</option>
                                            <option value="Teclado">Teclado</option>
                                            <option value="Mouse">Mouse</option>
                                            <option value="Impresora">Impresora</option>
                                            <option value="Escáner">Escáner</option>
                                            <option value="Altavoces">Altavoces</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="peripherals[0][brand]" class="form-control" placeholder="Marca" required>
                                    </td>
                                    <td>
                                        <input type="text" name="peripherals[0][model]" class="form-control" placeholder="Modelo">
                                    </td>
                                    <td>
                                        <input type="text" name="peripherals[0][serial]" class="form-control" placeholder="Serial" required>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm remove-row" disabled>
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
<<<<<<< HEAD
                </div> 
                <div class="w-100"></div>

              <div class="col-md-6">
                    <div class="form-floating">
                        <input name="type_peripheral" class="form-control" placeholder="Tipo del Periférico" value="{{ old('type_peripheral') }}" required>
                        <label>Tipo del Periférico</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="serial_peripheral" class="form-control" placeholder="Serial del Periférico" value="{{ old('serial_peripheral') }}" required>
                        <label>Serial del Periférico</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="brand_peripheral" class="form-control" placeholder="Marca del Periférico" value="{{ old('brand_peripheral') }}" required>
                        <label>Marca del Periférico</label>
                    </div>
                </div>    
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="type_peripheral" class="form-control" placeholder="Tipo del Periférico" value="{{ old('type_peripheral') }}" required>
                        <label>Tipo del Periférico</label>
                    </div>
                </div>
                </div>    
                <div class="text-center">
=======
                    
                    <button type="button" class="btn btn-success btn-sm mt-2" id="addPeripheral">
                        <i class="bi bi-plus-circle"></i> Agregar otro periférico
                    </button>
                </div>

                <div class="text-center mt-4">
>>>>>>> main
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('equipos.index')}}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let peripheralCount = 1;
        const addButton = document.getElementById('addPeripheral');
        const tableBody = document.querySelector('#peripheralsTable tbody');
        
        // Función para agregar nueva fila de periférico
        addButton.addEventListener('click', function() {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <select name="peripherals[${peripheralCount}][type]" class="form-control" required>
                        <option value="">Seleccione tipo</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Teclado">Teclado</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Impresora">Impresora</option>
                        <option value="Escáner">Escáner</option>
                        <option value="Altavoces">Altavoces</option>
                        <option value="Otro">Otro</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="peripherals[${peripheralCount}][brand]" class="form-control" placeholder="Marca" required>
                </td>
                <td>
                    <input type="text" name="peripherals[${peripheralCount}][model]" class="form-control" placeholder="Modelo">
                </td>
                <td>
                    <input type="text" name="peripherals[${peripheralCount}][serial]" class="form-control" placeholder="Serial" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            `;
            
            tableBody.appendChild(newRow);
            peripheralCount++;
            
            // Habilitar el botón de eliminar de la primera fila si hay más de una fila
            if (document.querySelectorAll('#peripheralsTable tbody tr').length > 1) {
                document.querySelectorAll('.remove-row').forEach(btn => {
                    btn.disabled = false;
                });
            }
        });
        
        // Función para eliminar fila de periférico
        tableBody.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row') || e.target.closest('.remove-row')) {
                const btn = e.target.classList.contains('remove-row') ? e.target : e.target.closest('.remove-row');
                const row = btn.closest('tr');
                
                if (document.querySelectorAll('#peripheralsTable tbody tr').length > 1) {
                    row.remove();
                    
                    // Si solo queda una fila, deshabilitar su botón de eliminar
                    if (document.querySelectorAll('#peripheralsTable tbody tr').length === 1) {
                        document.querySelector('.remove-row').disabled = true;
                    }
                    
                    // Reindexar los nombres de los campos
                    document.querySelectorAll('#peripheralsTable tbody tr').forEach((row, index) => {
                        row.querySelectorAll('select, input').forEach(field => {
                            const name = field.getAttribute('name');
                            if (name) {
                                const newName = name.replace(/peripherals\[\d+\]/, `peripherals[${index}]`);
                                field.setAttribute('name', newName);
                            }
                        });
                    });
                }
            }
        });
    });
</script>
@endpush

@push('styles')
<style>
    #peripheralsTable th {
        white-space: nowrap;
    }
    .remove-row {
        cursor: pointer;
    }
</style>
@endpush
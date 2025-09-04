<!-- @extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Importar Empleados</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Empleados</a></li>
            <li class="breadcrumb-item active">Importar</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-4">
            <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="excel_file" class="form-label">Archivo Excel (.xls o .xlsx)</label>
                    <input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xls,.xlsx" required>
                </div>
                <button type="submit" class="btn btn-success">Importar</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</section>
@endsection -->


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Importar Empleados desde Excel</h2>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('import_errors'))
                        <div class="alert alert-warning">
                            <h5>Errores encontrados:</h5>
                            <ul>
                                @foreach (session('import_errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="excel_file" class="form-label">Archivo Excel</label>
                            <input type="file" class="form-control" id="excel_file" name="excel_file" required accept=".xlsx,.xls,.csv">
                            <div class="form-text">Formatos soportados: .xlsx, .xls, .csv (máx. 5MB)</div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-file-import"></i> Importar
                        </button>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                    </form>
                    
                    <hr>
                    
                    <div class="mt-4">
                        <h5>Instrucciones:</h5>
                        <ul>
                            <li>El archivo debe contener los encabezados en la primera fila</li>
                            <li>Las columnas obligatorias son: cédula, nombres y apellidos</li>
                            <li>Las fechas deben estar en formato día/mes/año o como número de Excel</li>
                            <li>Los empleados existentes se actualizarán basándose en la cédula</li>
                        </ul>
                        
                        <div class="alert alert-info mt-3">
                            <strong>Nota:</strong> Se recomienda hacer una copia de seguridad antes de importar.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
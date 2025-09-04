@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Empleados</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Empleados</li>
        </ol>
    </nav>
</div>

<div class="card-header py-3">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h3 class="m-0 font-weight-bold text-primary">Empleados</h3>
        </div>

        <div class="col-md-2 text-end">
            <a href="{{ route('employees.create') }}" class="btn btn-primary w-100">
                <i class="bi bi-plus-circle"></i> Nuevo
            </a>
        </div>

        <div class="col-md-2 text-end">
            <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" name="excel_file" class="form-control form-control-sm" required>
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="bi bi-upload"></i> Importar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card-body">
    <form class="navbar-search" method="GET" action="{{ route('employees.index') }}">
        <div class="row mt-3">
            <div class="col-md-auto">
                <select class="form-select bg-light border-0 small" name="records_per_page">
                    <option {{ $data->records_per_page == 2 ? 'selected' : '' }} value="2">2</option>
                    <option {{ $data->records_per_page == 10 ? 'selected' : '' }} value="10">10</option>
                    <option {{ $data->records_per_page == 15 ? 'selected' : '' }} value="15">15</option>
                    <option {{ $data->records_per_page == 30 ? 'selected' : '' }} value="30">30</option>
                    <option {{ $data->records_per_page == 50 ? 'selected' : '' }} value="50">50</option>
                </select>
            </div>

            <div class="col-md-11">
                <div class="input-group mb-3">
                    <input type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Buscar..."
                        name="filter"
                        value="{{ $data->filter }}" />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Email</th>
                <th>Cargo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->full_name }}</td>
                    <td>{{ $employee->cedula  }}</td>
                    <td>{{ $employee->correo  }}</td>
                    <td>{{ $employee->cargo }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('employees.delete', $employee->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btnDelete"><i class="bi bi-trash-fill"></i></button>
                        </form>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye-fill"></i>
                         </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <nav class="mt-4">
        {{ $employees->appends(request()->except('page'))->links('vendor.pagination.custom') }}
    </nav>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.btnDelete').click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: "¿Desea eliminar este empleado?",
                text: "No podrá revertir esta acción",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = $(this).closest('form');
                    form.submit();
                }
            });
        });
    });
</script>
@endpush

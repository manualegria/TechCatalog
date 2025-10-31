@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Nuevo Usuario</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
            <li class="breadcrumb-item active">Nuevo Usuario</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Nuevo Usuario</h3>

                   @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="row g-3" action="{{ route('users.store')}}" method="POST" id="frmCreate">
                @csrf

     

                {{-- Nombres (autocomplete con empleados) --}}
                <div class="col-md-6">
    <div class="form-floating">
        <input id="first_name" name="first_name" class="form-control"
               placeholder="Nombre empleado..." autocomplete="off">
        <label>Nombres</label>
    </div>
</div>

<div class="col-md-6">
    <div class="form-floating">
        <input id="last_name" name="last_name" class="form-control"
               placeholder="Apellido..." >
        <label>Apellidos</label>
    </div>
</div>

<div class="col-md-6">
    <div class="form-floating">
        <input id="email" name="email" class="form-control"
               placeholder="Email..." >
        <label>Email</label>
    </div>
</div>

<div class="col-md-6">
    <div class="form-floating">
        <input id="document" name="document" class="form-control"
               placeholder="Documento..." >
        <label>Documento</label>
    </div>

                {{-- Password --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" 
                               placeholder="Password" required>
                        <label>Password</label>
                    </div>
                </div>

                {{-- Rol --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-control" name="role_id" required>
                            <option value="">-- Seleccionar rol --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <label>Rol</label>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary" form="frmCreate" id="btnSave">Guardar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</section>

@endsection

@section('scripts')
<script>
$(function() {
    $("#first_name").autocomplete({
        source: "{{ route('employees.search') }}",
        minLength: 2,
        select: function(event, ui) {
            // Llenar campos automáticamente
            $("#first_name").val(ui.item.nombres);
            $("#last_name").val(ui.item.apellidos);
            $("#email").val(ui.item.correo_corporativo);
            $("#document").val(ui.item.cedula);
            return false; // evita que jQuery UI reemplace el valor por label
        }
    }).autocomplete("instance")._renderItem = function(ul, item) {
        return $("<li>")
            .append(`<div>${item.nombres} ${item.apellidos} - ${item.correo_corporativo ?? 'Sin correo'} </div>`)
            .appendTo(ul);
    };
});
</script>
@endsection

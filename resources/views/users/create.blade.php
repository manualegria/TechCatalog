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

            <form class="row g-3" action="{{ route('users.store')}}" method="POST" id="frmCreate">
                @csrf

                {{-- Nombres (autocomplete con empleados) --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input id="first_name" name="first_name" class="form-control" placeholder="Nombre...">
                        <label>Nombres</label>
                    </div>
                </div>

                {{-- Apellidos --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input id="last_name" name="last_name" class="form-control" placeholder="Apellido...">
                        <label>Apellidos</label>
                    </div>
                </div>

                {{-- Email (se autocompleta con correo corporativo si existe) --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input id="email" name="email" class="form-control" placeholder="Email...">
                        <label>Email</label>
                    </div>
                </div>

                {{-- Password --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <label>Password</label>
                    </div>
                </div>

                {{-- Documento --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="document" class="form-control" placeholder="Documento...">
                        <label>Documento</label>
                    </div>
                </div>

                {{-- Rol --}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-control" name="role_id">
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
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</section>

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$(function() {
    $("#first_name").autocomplete({
        source: "{{ route('employees.search') }}",
        minLength: 2,
        select: function(event, ui) {
            $("#first_name").val(ui.item.nombres);
            $("#last_name").val(ui.item.apellidos);
            $("#email").val(ui.item.correo_corporativo);
            return false; // evita que autocomplete reemplace todo
        }
    });
});
</script>
@endsection

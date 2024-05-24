
@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Roles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Nueva Rol</li>
            </ol>
        </nav>
    </div>

    <section class="role dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nueva Rol</h5>

                <form class="row g-3" action="{{ route('roles.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Rol">
                            <label>Rol</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('roles.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>

        </div>

    </section>

@endsection

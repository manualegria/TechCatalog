@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Sedes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('campus.index') }}">Sedes</a></li>
                <li class="breadcrumb-item active">Editar Sede</li>
            </ol>
        </nav>
    </div>

    <section class="campus dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Empresa</h5>

                <form class="row g-3" action="{{ route('campuses.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="campus_id" value="{{ $campus->id }}" />

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Empresa" value="{{ $campus->name }}">
                            <label>Empresa</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('campuses.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>

        </div>

    </section>

@endsection
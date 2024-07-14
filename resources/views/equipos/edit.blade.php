@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Equipos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('equipos.index') }}">Equipos</a></li>
                <li class="breadcrumb-item active">Editar Equipo</li>
            </ol>
        </nav>
    </div>

    <section class="equipo dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Equipo</h5>

                <form class="row g-3" action="{{ route('equipos.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="equipo_id" value="{{ $equipos->id }}" /> 
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="owner" class="form-control" placeholder="Owner" value="{{ $equipos->owner }}"> <!-- Cambié $equipos a $equipo -->
                            <label>Propietario</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="specifications" class="form-control" placeholder="Specifications" value="{{ $equipos->specifications }}"> 
                            <label>Especificaciones</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">

                            <select class="form-control" name="campuses_id">
                                @foreach ($campuses as $Campus)
                                    <option value="{{ $Campus->id }}" {{ $equipos->campuses_id == $Campus->id ? 'selected' : '' }}>{{ $Campus->name }}</option> 
                                @endforeach
                            </select>
                            <label>Sede</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">

                            <select class="form-control" name="area_id">
                                @foreach ($areas as $Area)
                                    <option value="{{ $Area->id }}" {{ $equipos->area_id == $Area->id ? 'selected' : '' }}>{{ $Area->name }}</option> 
                                @endforeach
                            </select>
                            <label>Area</label>

                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>

        </div>

    </section>

@endsection

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

            <form class="row g-3" action="{{ route('equipos.store')}}" method="POST">
                @csrf
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
                        <label>Campus</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="price" class="form-control" placeholder="Precio" value="{{ old('price') }}" required>
                        <label>Precio</label>
                    </div>
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< Updated upstream
=======

>>>>>>> emirDev
                </div> 
                <div class="w-100"></div>

              <div class="col-md-6">
                    <div class="form-floating">
                        <input name="type_peripheral" class="form-control" placeholder="Tipo del Periférico" value="{{ old('type_peripheral') }}" required>
                        <label>Tipo del Periférico</label>
                    </div>
<<<<<<< HEAD
=======
>>>>>>> 99ecfd50afcf39f13f0a5898d7f4a7693d72cea5
=======

>>>>>>> Stashed changes
>>>>>>> emirDev
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
<<<<<<< HEAD
<<<<<<< HEAD
                </div>    
=======
=======
<<<<<<< Updated upstream
=======

                </div>    

>>>>>>> Stashed changes
>>>>>>> emirDev
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="type_peripheral" class="form-control" placeholder="Tipo del Periférico" value="{{ old('type_peripheral') }}" required>
                        <label>Tipo del Periférico</label>
                    </div>
<<<<<<< Updated upstream
                </div>
>>>>>>> 99ecfd50afcf39f13f0a5898d7f4a7693d72cea5
              
=======
                </div>    
>>>>>>> Stashed changes
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('equipos.index')}}" class="btn btn-secondary">Volver</a>
                </div>
            </form>

        </div>

    </div>

</section>

@endsection

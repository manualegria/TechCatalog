@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Areas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('area.index') }}">Areas</a></li>
                <li class="breadcrumb-item active">Editar Area</li>
            </ol>
        </nav>
    </div>

    <section class="area dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Area</h5>

                <form class="row g-3" action="{{ route('area.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="area_id" value="{{ $area->id }}" />

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Area" value="{{ $area->name }}">
                            <label>Area</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('areaes.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>

        </div>

    </section>

@endsection
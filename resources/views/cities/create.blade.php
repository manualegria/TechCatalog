
@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Ciudades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sections.index') }}">Ciudades</a></li>
                <li class="breadcrumb-item active">Nueva Ciudad</li>
            </ol>
        </nav>
    </div>

    <section class="city dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nueva Ciudad</h5>

                <form class="row g-3" action="{{ route('cities.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="ciudad">
                            <label>Ciudad</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('sections.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>

        </div>

    </section>

@endsection


@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Empresas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
                <li class="breadcrumb-item active">Nueva Empresa</li>
            </ol>
        </nav>
    </div>

    <section class="city dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nueva Empresa</h5>

                <form class="row g-3" action="{{ route('companies.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Empresa">
                            <label>Empresa</label>
                            <input name="nit" class="form-control" placeholder="Nit">

                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('companies.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>

        </div>

    </section>

@endsection

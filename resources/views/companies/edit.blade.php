@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Empresas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
                <li class="breadcrumb-item active">Editar Empresa</li>
            </ol>
        </nav>
    </div>

    <section class="company dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Empresa</h5>

                <form class="row g-3" action="{{ route('companies.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="company_id" value="{{ $company->id }}" />

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Empresa" value="{{ $company->name }}">
                            <label>Empresa</label>
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
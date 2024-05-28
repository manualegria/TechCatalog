@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Sedes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('campus.index') }}">Sedes</a></li>
            <li class="breadcrumb-item active">Nueva Sede</li>
        </ol>
    </nav>
</div>

<section class="campuses dashboard">

    <div class="card">

        <div class="card-body">

            <h5 class="card-title">Nueva Sede</h5>
<!-- 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <form class="row g-3" action="{{ route('campuses.store')}}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input name="name" class="form-control" placeholder="Sede" value="{{ old('name') }}" required>
                        <label>Sede</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input name="address" class="form-control" placeholder="Address"
                         value="{{ old('address') }}" required>
                        <label>Dirección</label>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-floating">

                            <select class="form-control" name="company_id">
                                @foreach ($companies as $Company)
                                    <option value="{{ $Company->id }}">{{ $Company->name }}</option>
                                @endforeach
                            </select>
                            <label>Empresa</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">

                            <select class="form-control" name="company_id">
                                @foreach ($cities as $City)
                                    <option value="{{ $City->id }}">{{ $City->name }}</option>
                                @endforeach
                            </select>
                            <label>Ciudad</label>

                        </div>
                    </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('campus.index')}}" class="btn btn-secondary">Volver</a>
                </div>
            </form>

        </div>

    </div>

</section>

@endsection

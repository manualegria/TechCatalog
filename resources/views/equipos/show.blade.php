@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Detalles del Equipo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('equipos.index') }}">Equipos</a></li>
                <li class="breadcrumb-item active">Detalles del Equipo</li>
            </ol>
        </nav>
    </div>

    <section class="equipo dashboard">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detalles del Equipo</h5>

                <table class="table table-striped">
                    <tr>
                    <tr>
                        <th>Propietario:</th>
                        <td>{{ $equipo->owner }}</td>
                    </tr>
                        <th>Tipo de Equipo:</th>
                        <td>{{ $equipo->type }}</td>
                    </tr>
                    <tr>
                        <th>Marca:</th>
                        <td>{{ $equipo->brand }}</td>
                    </tr>
                    <tr>
                        <th>Serial:</th>
                        <td>{{ $equipo->serial }}</td>
                    </tr>
                   
                    <tr>
                        <th>Especificaciones:</th>
                        <td>{{ $equipo->specifications }}</td>
                    </tr>
                    <tr>
                        <th>Modelo:</th>
                        <td>{{ $equipo->model }}</td>
                    </tr>
                    <tr>
                        <th>Tipo de Periferico :</th>
                        <td>{{ $equipo->type_peripheral }}</td>
                    </tr>
                    <tr>
                        <th>Marca Periferico:</th>
                        <td>{{ $equipo->brand_peripheral }}</td>
                    </tr>
                    <tr>
                        <th>Serial Periferico:</th>
                        <td>{{ $equipo->serial_peripheral }}</td>
                    </tr>
                    <tr>
                        <th>Precio:</th>
                        <td>{{ $equipo->price }}</td>
                    </tr>
                    <tr>
                        <th>Sede:</th>
                        <td>{{ $equipo->sede }}</td>

                    </tr>
                    <tr>
                        <th>Área:</th>
                        <td>{{  $equipo->area}}</td>

                    </tr>
                </table>
                
                </table>

                <div class="text-center">
                    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>

    </section>

@endsection

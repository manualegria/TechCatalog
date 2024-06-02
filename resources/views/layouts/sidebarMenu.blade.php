@php

    $currentUrl = Request::url();

@endphp

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $currentUrl != url('/') ? 'collapsed' : '' }}" href="{{ route('home.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if(\App\Helpers\RoleHelper::isAuthorized('Cities.showCities'))
            <li class="nav-item">
                <a class="nav-link {{ !str_contains($currentUrl, 'cities') ? 'collapsed' : '' }}" href="{{ route('cities.index') }}">
                <i class="bi bi-puzzle"></i>
                <span>Ciudades</span>
                </a>
            </li>
        @endif

        @if(\App\Helpers\RoleHelper::isAuthorized('Campuses.showCampuses'))
            <li class="nav-item">
                <a class="nav-link {{ !str_contains($currentUrl, 'campus') ? 'collapsed' : '' }}" href="{{ route('campus.index') }}">
                <i class="ri-community-line"></i>
                <span>Sedes</span>
                </a>
            </li>
        @endif

        @if(\App\Helpers\RoleHelper::isAuthorized('Roles.showRoles'))
            <li class="nav-item">
                <a class="nav-link {{ !str_contains($currentUrl, 'roles') ? 'collapsed' : '' }}" 
                href="{{ route('roles.index') }}">
                <i class="ri-door-open-fill"></i>
                <span>Roles</span>
                </a>
            </li>
        @endif

        @if(\App\Helpers\RoleHelper::isAuthorized('Companies.showRoles'))
            <li class="nav-item">
                <a class="nav-link {{ !str_contains($currentUrl, 'roles') ? 'collapsed' : '' }}" 
                href="{{ route('companies.index') }}">
                <i class="ri-building-2-fill"></i>
                <span>Empresas</span>
                </a>
            </li>
        @endif

        @if(\App\Helpers\RoleHelper::isAuthorized('Usuarios.showUsers'))
            <li class="nav-item">
                <a class="nav-link {{ !str_contains($currentUrl, 'roles') ? 'collapsed' : '' }}" 
                href="{{ route('users.index') }}">
                <i class="ri-account-circle-fill"></i>
                <span>Usuarios</span>
                </a>
            </li>
        @endif

        @if(\App\Helpers\RoleHelper::isAuthorized('Areas.showAreas'))
            <li class="nav-item">
                <a class="nav-link {{ !str_contains($currentUrl, 'roles') ? 'collapsed' : '' }}" 
                href="{{ route('Areas.index') }}">
                <i class="ri-account-circle-fill"></i>
                <span>Areas</span>
                </a>
            </li>
        @endif
   
    </ul>

  </aside>
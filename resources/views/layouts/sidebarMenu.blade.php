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
                <i class="bi bi-shield-lock"></i>
                <span>Sedes</span>
                </a>
            </li>
        @endif

        @if(\App\Helpers\RoleHelper::isAuthorized('Roles.showRoles'))
            <li class="nav-item">
                <a class="nav-link {{ !str_contains($currentUrl, 'roles') ? 'collapsed' : '' }}" 
                href="{{ route('roles.index') }}">
                <i class="bi bi-shield-lock"></i>
                <span>Roles</span>
                </a>
            </li>
        @endif
   
    </ul>

  </aside>
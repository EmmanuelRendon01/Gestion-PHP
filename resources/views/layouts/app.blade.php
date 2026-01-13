<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        {{-- Navbar --}}
        <nav class="blue darken-2">
            <div class="nav-wrapper container">
                <a href="{{ route('dashboard') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('products.index') }}">Productos</a></li>
                    @role('admin')
                    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                    <li><a href="{{ route('audits.index') }}">Auditoría</a></li>
                    @endrole
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown-user">
                            {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Dropdown de usuario --}}
        <ul id="dropdown-user" class="dropdown-content">
            <li><a href="{{ route('profile.show') }}">Mi Perfil</a></li>
            <li class="divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit();">Cerrar Sesión</a>
                </form>
            </li>
        </ul>

        {{-- Sidenav para móvil --}}
        <ul class="sidenav" id="mobile-nav">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('products.index') }}">Productos</a></li>
            @role('admin')
            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
            <li><a href="{{ route('audits.index') }}">Auditoría</a></li>
            @endrole
            <li class="divider"></li>
            <li><a href="{{ route('profile.show') }}">Mi Perfil</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit();">Cerrar Sesión</a>
                </form>
            </li>
        </ul>

        {{-- Contenido Principal --}}
        <main class="container">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <footer class="page-footer blue darken-2" style="margin-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <p class="white-text">Sistema de Gestión © {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Materialize JS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
        @livewireScripts
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inicializar componentes de Materialize
                M.AutoInit();
            });
        </script>
        
        @stack('scripts')
    </body>
</html>

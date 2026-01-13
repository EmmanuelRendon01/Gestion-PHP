<x-app-layout>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Dashboard</span>
                    <p>¡Bienvenido al Sistema de Gestión!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Card Productos --}}
        <div class="col s12 m6 l4">
            <div class="card blue darken-1">
                <div class="card-content white-text">
                    <span class="card-title">
                        <i class="material-icons left">inventory_2</i>Productos
                    </span>
                    <p>Gestiona el catálogo de productos del sistema</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('products.index') }}" class="white-text">Ver Productos</a>
                </div>
            </div>
        </div>

        {{-- Card Usuarios (solo admin) --}}
        @role('admin')
        <div class="col s12 m6 l4">
            <div class="card orange darken-1">
                <div class="card-content white-text">
                    <span class="card-title">
                        <i class="material-icons left">people</i>Usuarios
                    </span>
                    <p>Administra los usuarios del sistema</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('users.index') }}" class="white-text">Ver Usuarios</a>
                </div>
            </div>
        </div>

        {{-- Card Auditoría (solo admin) --}}
        <div class="col s12 m6 l4">
            <div class="card teal darken-1">
                <div class="card-content white-text">
                    <span class="card-title">
                        <i class="material-icons left">history</i>Auditoría
                    </span>
                    <p>Revisa el historial de acciones del sistema</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('audits.index') }}" class="white-text">Ver Auditoría</a>
                </div>
            </div>
        </div>
        @endrole
    </div>
</x-app-layout>

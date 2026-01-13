<x-app-layout>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="row" style="margin-bottom: 0;">
                        <div class="col s6">
                            <span class="card-title">Usuarios</span>
                        </div>
                        <div class="col s6 right-align">
                            <a href="{{ route('users.create') }}" class="btn waves-effect waves-light blue">
                                <i class="material-icons left">person_add</i>Nuevo Usuario
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mensajes --}}
    @if(session('success'))
        <div class="row">
            <div class="col s12">
                <div class="card-panel green lighten-4 green-text text-darken-4">
                    <i class="material-icons left">check_circle</i>
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="row">
            <div class="col s12">
                <div class="card-panel red lighten-4 red-text text-darken-4">
                    <i class="material-icons left">error</i>
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <table class="striped responsive-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="chip {{ $role->name == 'admin' ? 'blue white-text' : 'grey lighten-2' }}">
                                                {{ ucfirst($role->name) }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user) }}" 
                                           class="btn-small waves-effect waves-light blue tooltipped"
                                           data-position="top" data-tooltip="Ver">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{ route('users.edit', $user) }}" 
                                           class="btn-small waves-effect waves-light orange tooltipped"
                                           data-position="top" data-tooltip="Editar">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('users.destroy', $user) }}" 
                                                  method="POST" 
                                                  style="display: inline;"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn-small waves-effect waves-light red tooltipped"
                                                        data-position="top" data-tooltip="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="center-align grey-text">
                                        No hay usuarios registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($users->hasPages())
                    <div class="card-action center-align">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

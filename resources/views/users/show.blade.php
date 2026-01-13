<x-app-layout>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons left">person</i>
                        {{ $user->name }}
                    </span>
                    
                    <div class="divider"></div>

                    <div class="section">
                        <div class="row">
                            <div class="col s12 m6">
                                <p><strong>Email:</strong></p>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="col s12 m6">
                                <p><strong>Rol:</strong></p>
                                <p>
                                    @foreach($user->roles as $role)
                                        <span class="chip {{ $role->name == 'admin' ? 'blue white-text' : 'grey lighten-2' }}">
                                            {{ ucfirst($role->name) }}
                                        </span>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m6">
                                <p><strong>Creado:</strong></p>
                                <p>{{ $user->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="col s12 m6">
                                <p><strong>Última actualización:</strong></p>
                                <p>{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-action">
                    <a href="{{ route('users.edit', $user) }}" class="btn waves-effect waves-light orange">
                        <i class="material-icons left">edit</i>Editar
                    </a>
                    <a href="{{ route('users.index') }}" class="btn waves-effect waves-light grey">
                        <i class="material-icons left">arrow_back</i>Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

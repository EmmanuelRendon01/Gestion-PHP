<x-app-layout>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Crear Nuevo Usuario</span>
                    
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            {{-- Nombre --}}
                            <div class="input-field col s12 m6">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                       class="@error('name') invalid @enderror" required>
                                <label for="name">Nombre</label>
                                @error('name')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="input-field col s12 m6">
                                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                       class="@error('email') invalid @enderror" required>
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Contraseña --}}
                            <div class="input-field col s12 m6">
                                <input type="password" id="password" name="password" 
                                       class="@error('password') invalid @enderror" required>
                                <label for="password">Contraseña</label>
                                @error('password')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Confirmar Contraseña --}}
                            <div class="input-field col s12 m6">
                                <input type="password" id="password_confirmation" name="password_confirmation" required>
                                <label for="password_confirmation">Confirmar Contraseña</label>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Rol --}}
                            <div class="input-field col s12 m6">
                                <select name="role" id="role" required>
                                    <option value="" disabled selected>Seleccionar rol</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="role">Rol</label>
                                @error('role')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn waves-effect waves-light blue">
                                    <i class="material-icons left">save</i>Guardar Usuario
                                </button>
                                <a href="{{ route('users.index') }}" class="btn waves-effect waves-light grey">
                                    <i class="material-icons left">arrow_back</i>Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

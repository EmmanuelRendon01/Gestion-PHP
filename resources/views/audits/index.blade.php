<x-app-layout>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons left">history</i>Historial de Auditoría
                    </span>
                    
                    {{-- Filtros --}}
                    <form method="GET" action="{{ route('audits.index') }}">
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <select name="event">
                                    <option value="">Todos los eventos</option>
                                    <option value="created" {{ request('event') == 'created' ? 'selected' : '' }}>Creación</option>
                                    <option value="updated" {{ request('event') == 'updated' ? 'selected' : '' }}>Actualización</option>
                                    <option value="deleted" {{ request('event') == 'deleted' ? 'selected' : '' }}>Eliminación</option>
                                </select>
                                <label>Tipo de Evento</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <select name="auditable_type">
                                    <option value="">Todos los módulos</option>
                                    @foreach($auditableTypes as $type)
                                        <option value="{{ $type }}" {{ request('auditable_type') == $type ? 'selected' : '' }}>
                                            {{ class_basename($type) }}
                                        </option>
                                    @endforeach
                                </select>
                                <label>Módulo</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <button type="submit" class="btn waves-effect waves-light blue">
                                    <i class="material-icons left">search</i>Filtrar
                                </button>
                                <a href="{{ route('audits.index') }}" class="btn waves-effect waves-light grey">
                                    Limpiar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <table class="striped responsive-table">
                        <thead>
                            <tr>
                                <th>Fecha/Hora</th>
                                <th>Usuario</th>
                                <th>Evento</th>
                                <th>Módulo</th>
                                <th>ID Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($audits as $audit)
                                <tr>
                                    <td>{{ $audit->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ $audit->user?->name ?? 'Sistema' }}</td>
                                    <td>
                                        @switch($audit->event)
                                            @case('created')
                                                <span class="chip green white-text">Creación</span>
                                                @break
                                            @case('updated')
                                                <span class="chip orange white-text">Actualización</span>
                                                @break
                                            @case('deleted')
                                                <span class="chip red white-text">Eliminación</span>
                                                @break
                                            @default
                                                <span class="chip grey white-text">{{ $audit->event }}</span>
                                        @endswitch
                                    </td>
                                    <td>{{ class_basename($audit->auditable_type) }}</td>
                                    <td>{{ $audit->auditable_id }}</td>
                                    <td>
                                        <a href="{{ route('audits.show', $audit) }}" 
                                           class="btn-small waves-effect waves-light blue tooltipped"
                                           data-position="top" data-tooltip="Ver Detalle">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="center-align grey-text">
                                        No hay registros de auditoría.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($audits->hasPages())
                    <div class="card-action center-align">
                        {{ $audits->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

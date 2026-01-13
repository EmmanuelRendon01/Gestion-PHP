<x-app-layout>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons left">assignment</i>
                        Detalle de Auditoría #{{ $audit->id }}
                    </span>
                    
                    <div class="divider"></div>

                    <div class="section">
                        <div class="row">
                            <div class="col s12 m6">
                                <p><strong>Fecha y Hora:</strong></p>
                                <p>{{ $audit->created_at->format('d/m/Y H:i:s') }}</p>
                            </div>
                            <div class="col s12 m6">
                                <p><strong>Usuario:</strong></p>
                                <p>{{ $audit->user?->name ?? 'Sistema' }} ({{ $audit->user?->email ?? 'N/A' }})</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m6">
                                <p><strong>Tipo de Evento:</strong></p>
                                <p>
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
                                </p>
                            </div>
                            <div class="col s12 m6">
                                <p><strong>Módulo Afectado:</strong></p>
                                <p>{{ class_basename($audit->auditable_type) }} (ID: {{ $audit->auditable_id }})</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m6">
                                <p><strong>Dirección IP:</strong></p>
                                <p>{{ $audit->ip_address ?? 'N/A' }}</p>
                            </div>
                            <div class="col s12 m6">
                                <p><strong>User Agent:</strong></p>
                                <p style="word-break: break-all;">{{ Str::limit($audit->user_agent, 100) ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    {{-- Valores Anteriores --}}
                    @if(!empty($audit->old_values))
                        <div class="section">
                            <h6><i class="material-icons tiny">history</i> Valores Anteriores</h6>
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>Campo</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($audit->old_values as $key => $value)
                                        <tr>
                                            <td><strong>{{ $key }}</strong></td>
                                            <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    {{-- Valores Nuevos --}}
                    @if(!empty($audit->new_values))
                        <div class="section">
                            <h6><i class="material-icons tiny">new_releases</i> Valores Nuevos</h6>
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>Campo</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($audit->new_values as $key => $value)
                                        <tr>
                                            <td><strong>{{ $key }}</strong></td>
                                            <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="card-action">
                    <a href="{{ route('audits.index') }}" class="btn waves-effect waves-light grey">
                        <i class="material-icons left">arrow_back</i>Volver al Historial
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

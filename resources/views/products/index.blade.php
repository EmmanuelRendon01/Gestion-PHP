<x-app-layout>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="row" style="margin-bottom: 0;">
                        <div class="col s6">
                            <span class="card-title">Productos</span>
                        </div>
                        <div class="col s6 right-align">
                            <a href="{{ route('products.create') }}" class="btn waves-effect waves-light blue">
                                <i class="material-icons left">add</i>Nuevo Producto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mensaje de éxito --}}
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

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <table class="striped responsive-table">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 width="60" height="60"
                                                 style="object-fit: cover; border-radius: 4px;">
                                        @else
                                            <span class="grey-text">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ Str::limit($product->description, 50) }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}" 
                                           class="btn-small waves-effect waves-light blue tooltipped"
                                           data-position="top" data-tooltip="Ver">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{ route('products.edit', $product) }}" 
                                           class="btn-small waves-effect waves-light orange tooltipped"
                                           data-position="top" data-tooltip="Editar">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" 
                                              method="POST" 
                                              style="display: inline;"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn-small waves-effect waves-light red tooltipped"
                                                    data-position="top" data-tooltip="Eliminar">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="center-align grey-text">
                                        No hay productos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Paginación --}}
                @if($products->hasPages())
                    <div class="card-action center-align">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

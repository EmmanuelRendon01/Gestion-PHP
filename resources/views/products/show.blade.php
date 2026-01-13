<x-app-layout>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                @if($product->image)
                    <div class="card-image">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <span class="card-title">{{ $product->name }}</span>
                    </div>
                @endif
                
                <div class="card-content">
                    @if(!$product->image)
                        <span class="card-title">{{ $product->name }}</span>
                    @endif
                    
                    <div class="row">
                        <div class="col s12">
                            <h5 class="blue-text">${{ number_format($product->price, 2) }}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <p class="grey-text text-darken-2">{{ $product->description }}</p>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col s6">
                            <small class="grey-text">
                                <i class="material-icons tiny">schedule</i>
                                Creado: {{ $product->created_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                        <div class="col s6">
                            <small class="grey-text">
                                <i class="material-icons tiny">update</i>
                                Actualizado: {{ $product->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>

                <div class="card-action">
                    <a href="{{ route('products.edit', $product) }}" class="btn waves-effect waves-light orange">
                        <i class="material-icons left">edit</i>Editar
                    </a>
                    <a href="{{ route('products.index') }}" class="btn waves-effect waves-light grey">
                        <i class="material-icons left">arrow_back</i>Volver
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" 
                          method="POST" 
                          style="display: inline;"
                          onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn waves-effect waves-light red right">
                            <i class="material-icons left">delete</i>Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

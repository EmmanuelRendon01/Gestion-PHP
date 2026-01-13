<x-app-layout>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Editar Producto</span>
                    
                    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            {{-- Nombre --}}
                            <div class="input-field col s12 m6">
                                <input type="text" id="name" name="name" 
                                       value="{{ old('name', $product->name) }}" 
                                       class="@error('name') invalid @enderror" required>
                                <label for="name">Nombre del Producto</label>
                                @error('name')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Precio --}}
                            <div class="input-field col s12 m6">
                                <input type="number" id="price" name="price" 
                                       value="{{ old('price', $product->price) }}" 
                                       step="0.01" min="0" class="@error('price') invalid @enderror" required>
                                <label for="price">Precio</label>
                                @error('price')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Descripción --}}
                            <div class="input-field col s12">
                                <textarea id="description" name="description" 
                                          class="materialize-textarea @error('description') invalid @enderror" 
                                          required>{{ old('description', $product->description) }}</textarea>
                                <label for="description">Descripción</label>
                                @error('description')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Imagen actual --}}
                            @if($product->image)
                                <div class="col s12 m4">
                                    <p><strong>Imagen actual:</strong></p>
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         style="max-width: 200px; border-radius: 8px;">
                                </div>
                            @endif

                            {{-- Nueva imagen --}}
                            <div class="file-field input-field col s12 {{ $product->image ? 'm8' : '' }}">
                                <div class="btn blue">
                                    <span><i class="material-icons">image</i></span>
                                    <input type="file" name="image" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" 
                                           placeholder="{{ $product->image ? 'Cambiar imagen (opcional)' : 'Seleccionar imagen (opcional)' }}">
                                </div>
                                @error('image')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn waves-effect waves-light blue">
                                    <i class="material-icons left">save</i>Actualizar Producto
                                </button>
                                <a href="{{ route('products.index') }}" class="btn waves-effect waves-light grey">
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

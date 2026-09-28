@extends('app.layout-admin')

@section('content')
    @if (session('success'))
        <div class="flex justify-center mt-6">
            <p class="bg-orange-300/70 text-lg font-semibold py-2 px-4 rounded-[20px] font-['Nunito_Sans']">
                {{ session('success') }}
            </p>
        </div>
    @endif

    <div class="max-w-[1258px] mx-auto px-4 py-10 mt-5 font-['Nunito_Sans']">
        <h1 class="text-2xl font-bold text-black mb-6">Editar Producto: {{ $producto->nombre }}</h1>

        {{-- Formulario de Edición --}}
        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data"
            class="border border-[#DCDCDC] p-6 rounded-lg bg-white shadow-sm flex flex-col gap-6">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="flex flex-col gap-1">
                <label for="nombre" class="text-sm font-semibold text-black">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" required
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black"
                    placeholder="Ej: Papas F.c/ Clásico">
                @error('nombre')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Descripción --}}
            <div class="flex flex-col gap-1">
                <label for="descripcion" class="text-sm font-semibold text-black">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black resize-y"
                    placeholder="Detalles del producto...">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Categoría --}}
            <div class="flex flex-col gap-1">
                <label for="categoria_id" class="text-sm font-semibold text-black">Categoría</label>
                <select name="categoria_id" id="categoria_id" required
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre_categoria }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <label class="text-sm font-semibold">Código comercial
                    <input name="codigo" value="{{ old('codigo', $producto->codigo) }}" class="mt-2 w-full rounded-lg border border-[#DCDCDC] px-3 py-2 text-sm">
                </label>
            </div>
            {{-- Grid para campos numéricos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Cajas --}}
                <div class="flex flex-col gap-1">
                    <label for="cajas" class="text-sm font-semibold text-black">Cajas (tx)</label>
                    <input type="number" name="cajas" id="cajas" value="{{ old('cajas', $producto->cajas) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black"
                        placeholder="Ej: 15">
                    @error('cajas')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Unidades --}}
                <div class="flex flex-col gap-1">
                    <label for="unidades" class="text-sm font-semibold text-black">Unidades (ux)</label>
                    <input type="number" name="unidades" id="unidades" value="{{ old('unidades', $producto->unidades) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black"
                        placeholder="Ej: 5">
                    @error('unidades')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Peso --}}
                <div class="flex flex-col gap-1">
                    <label for="peso" class="text-sm font-semibold text-black">Peso (gramos)</label>
                    <input type="text" name="peso" id="peso" value="{{ old('peso', $producto->peso) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black"
                        placeholder="Ej: 20">
                    @error('peso')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Vida Útil --}}
                <div class="flex flex-col gap-1">
                    <label for="vida_util" class="text-sm font-semibold text-black">Vida Útil (meses)</label>
                    <input type="text" name="vida_util" id="vida_util"
                        value="{{ old('vida_util', $producto->vida_util) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black"
                        placeholder="Ej: 8">
                    @error('vida_util')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Imagen --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-black">Imagen Actual</label>
                @if ($producto->imagen)
                    <div class="w-24 h-24 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                            class="w-full h-full object-cover">
                    </div>
                @else
                    <p class="text-sm text-gray-400 italic">Este producto no tiene imagen cargada.</p>
                @endif

                <label for="imagen" class="text-sm font-semibold text-black mt-2">Cambiar Imagen (Opcional)</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']">
                <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG, WebP</span>
                @error('imagen')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Botones de acción --}}
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-[#DCDCDC]">

                <button type="button" onclick="document.getElementById('delete-form').submit();"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Eliminar Producto
                </button>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.productos.index') }}"
                        class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="bg-black text-white hover:bg-[#ffa221] hover:text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                        Actualizar Producto
                    </button>
                </div>
            </div>
        </form>


        <form id="delete-form" action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST"
            class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

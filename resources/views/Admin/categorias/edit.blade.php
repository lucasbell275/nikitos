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
        <h1 class="text-2xl font-bold text-black mb-6">Editar Categoría</h1>

        <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data"
            class="border border-[#DCDCDC] p-6 rounded-lg bg-white shadow-sm flex flex-col gap-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-1">
                <label for="nombre_categoria" class="text-sm font-semibold text-black">Nombre de la Categoría</label>
                <input type="text" name="nombre_categoria" id="nombre_categoria"
                    value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}" required
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black">
                @error('nombre_categoria')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="color" class="text-sm font-semibold text-black">Color</label>
                <input type="color" name="color" id="color"
                    value="{{ old('color', $categoria->color ?? '#000000') }}"
                    class="h-10 w-24 border border-[#DCDCDC] rounded cursor-pointer p-1 bg-white">
                @error('color')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-black">Imagen Actual</label>
                @if (!empty($categoria->imagen))
                    <div class="w-24 h-24 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50">
                        <img src="{{ asset('storage/' . $categoria->imagen) }}" alt="{{ $categoria->nombre_categoria }}"
                            class="w-full h-full object-cover">
                    </div>
                @else
                    <p class="text-sm text-gray-400 italic">No hay imagen cargada actualmente.</p>
                @endif

                <label for="imagen" class="text-sm font-semibold text-black mt-2">Cambiar Imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']">
                <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG, WebP</span>
                @error('imagen')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-4 pt-4 border-t border-[#DCDCDC]">
                <button type="button" onclick="document.getElementById('delete-form').submit();"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Eliminar
                </button>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.categorias.index') }}"
                        class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="bg-black text-white hover:bg-[#ffa221] hover:text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                        Actualizar Categoría
                    </button>
                </div>
            </div>
        </form>

        <form id="delete-form" action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST"
            class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

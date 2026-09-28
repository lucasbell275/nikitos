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
        <h1 class="text-2xl font-bold text-black mb-6">Crear Nueva Categoría</h1>

        <form action="{{ route('admin.categorias.store') }}" method="POST" enctype="multipart/form-data"
            class="border border-[#DCDCDC] p-6 rounded-lg bg-white shadow-sm flex flex-col gap-6">
            @csrf

            <div class="flex flex-col gap-1">
                <label for="nombre_categoria" class="text-sm font-semibold text-black">Nombre de la Categoría</label>
                <input type="text" name="nombre_categoria" id="nombre_categoria" required
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white"
                    placeholder="Ej: Línea juvenil metalizada" value="{{ old('nombre_categoria') }}">
                @error('nombre_categoria')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="color" class="text-sm font-semibold text-black">Color de la Categoría</label>
                <div class="flex items-center gap-3">
                    <input type="color" name="color" id="color" value="{{ old('color', '#FFA221') }}"
                        class="h-10 w-24 border border-[#DCDCDC] rounded cursor-pointer p-1 bg-white">
                    <span class="text-xs text-gray-500">Selecciona un color representativo para la categoría.</span>
                </div>
                @error('color')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="imagen" class="text-sm font-semibold text-black">Imagen de la Categoría</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans'] bg-white">
                <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG, WebP</span>
                @error('imagen')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 mt-4 pt-4 border-t border-[#DCDCDC]">
                <a href="{{ route('admin.categorias.index') }}"
                    class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-black text-white hover:bg-[#ffa221] hover:text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Guardar Categoría
                </button>
            </div>
        </form>
    </div>
@endsection

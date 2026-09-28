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
        <h1 class="text-2xl font-bold text-black mb-6">Editar Sección Nosotros</h1>

        <form action="{{ route('admin.nosotros.update', $nosotros) }}" method="POST" enctype="multipart/form-data"
            class="border border-[#DCDCDC] p-6 rounded-lg bg-white shadow-sm flex flex-col gap-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-1">
                <label class="text-sm font-semibold text-black">Título Principal</label>
                <input type="text" name="titulo" value="{{ old('titulo', $nosotros->titulo) }}" required
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black"
                    placeholder="Ej: Quiénes Somos">
                @error('titulo')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="border-t border-[#DCDCDC] pt-4 flex flex-col gap-4">
                <h3 class="text-sm font-bold text-gray-700 uppercase">Sección 1</h3>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Subtítulo 1</label>
                    <input type="text" name="subtitulo_1" value="{{ old('subtitulo_1', $nosotros->subtitulo_1) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black">
                    @error('subtitulo_1')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Descripción 1</label>
                    <textarea name="descripcion_1" rows="3"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black resize-y">{{ old('descripcion_1', $nosotros->descripcion_1) }}</textarea>
                    @error('descripcion_1')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-black">Imagen 1</label>
                    @if (!empty($nosotros->imagen_1))
                        <div class="w-24 h-24 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50">
                            <img src="{{ asset('storage/' . $nosotros->imagen_1) }}" alt="Imagen 1"
                                class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="imagen_1" accept="image/*"
                        class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']">
                    <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG,
                        WebP</span>
                    @error('imagen_1')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="border-t border-[#DCDCDC] pt-4 flex flex-col gap-4">
                <h3 class="text-sm font-bold text-gray-700 uppercase">Sección 2</h3>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Subtítulo 2</label>
                    <input type="text" name="subtitulo_2" value="{{ old('subtitulo_2', $nosotros->subtitulo_2) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black">
                    @error('subtitulo_2')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Descripción 2</label>
                    <textarea name="descripcion_2" rows="3"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black resize-y">{{ old('descripcion_2', $nosotros->descripcion_2) }}</textarea>
                    @error('descripcion_2')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-black">Imagen 2</label>
                    @if (!empty($nosotros->imagen_2))
                        <div class="w-24 h-24 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50">
                            <img src="{{ asset('storage/' . $nosotros->imagen_2) }}" alt="Imagen 2"
                                class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="imagen_2" accept="image/*"
                        class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']">
                    <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG,
                        WebP</span>
                    @error('imagen_2')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="border-t border-[#DCDCDC] pt-4 flex flex-col gap-4">
                <h3 class="text-sm font-bold text-gray-700 uppercase">Sección 3</h3>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Subtítulo 3</label>
                    <input type="text" name="subtitulo_3" value="{{ old('subtitulo_3', $nosotros->subtitulo_3) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black">
                    @error('subtitulo_3')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Descripción 3</label>
                    <textarea name="descripcion_3" rows="3"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black resize-y">{{ old('descripcion_3', $nosotros->descripcion_3) }}</textarea>
                    @error('descripcion_3')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-black">Imagen 3</label>
                    @if (!empty($nosotros->imagen_3))
                        <div class="w-24 h-24 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50">
                            <img src="{{ asset('storage/' . $nosotros->imagen_3) }}" alt="Imagen 3"
                                class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="imagen_3" accept="image/*"
                        class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']">
                    <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG,
                        WebP</span>
                    @error('imagen_3')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="border-t border-[#DCDCDC] pt-4 flex flex-col gap-4">
                <h3 class="text-sm font-bold text-gray-700 uppercase">Sección 4</h3>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Subtítulo 4</label>
                    <input type="text" name="subtitulo_4" value="{{ old('subtitulo_4', $nosotros->subtitulo_4) }}"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black">
                    @error('subtitulo_4')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-semibold text-black">Descripción 4</label>
                    <textarea name="descripcion_4" rows="3"
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black resize-y">{{ old('descripcion_4', $nosotros->descripcion_4) }}</textarea>
                    @error('descripcion_4')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-black">Imagen 4</label>
                    @if (!empty($nosotros->imagen_4))
                        <div class="w-24 h-24 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50">
                            <img src="{{ asset('storage/' . $nosotros->imagen_4) }}" alt="Imagen 4"
                                class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="imagen_4" accept="image/*"
                        class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']">
                    <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG,
                        WebP</span>
                    @error('imagen_4')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 mt-4 pt-4 border-t border-[#DCDCDC]">
                <a href="{{ route('nosotros.index') }}"
                    class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-black text-white hover:bg-[#ffa221] hover:text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Actualizar Cambios
                </button>
            </div>
        </form>
    </div>
@endsection

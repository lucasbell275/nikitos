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
        <h1 class="text-2xl font-bold text-black mb-6">Editar Configuración del Home</h1>

        <form action="{{ route('admin.home.update', $home->id) }}" method="POST" enctype="multipart/form-data"
            class="border border-[#DCDCDC] p-6 rounded-lg bg-white shadow-sm flex flex-col gap-6">
            @csrf
            @method('PUT')

            <div class="border border-[#DCDCDC] p-6 rounded-lg bg-gray-50 flex flex-col gap-6">
                <h2 class="text-lg font-semibold text-black border-b border-[#DCDCDC] pb-2">Sección Hero (Portada)</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1 md:col-span-2">
                        <label for="titulo" class="text-sm font-semibold text-black">Título Principal</label>
                        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $home->titulo) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('titulo')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1 md:col-span-2">
                        <label for="descripcion" class="text-sm font-semibold text-black">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black resize-y bg-white">{{ old('descripcion', $home->descripcion) }}</textarea>
                        @error('descripcion')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="boton_descripcion_1_texto" class="text-sm font-semibold text-black">Texto Botón
                            1</label>
                        <input type="text" name="boton_descripcion_1_texto" id="boton_descripcion_1_texto"
                            value="{{ old('boton_descripcion_1_texto', $home->boton_descripcion_1_texto) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('boton_descripcion_1_texto')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="boton_descripcion_1_redireccion" class="text-sm font-semibold text-black">Enlace Botón
                            1</label>
                        <input type="text" name="boton_descripcion_1_redireccion" id="boton_descripcion_1_redireccion"
                            value="{{ old('boton_descripcion_1_redireccion', $home->boton_descripcion_1_redireccion) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('boton_descripcion_1_redireccion')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="boton_descripcion_2_texto" class="text-sm font-semibold text-black">Texto Botón
                            2</label>
                        <input type="text" name="boton_descripcion_2_texto" id="boton_descripcion_2_texto"
                            value="{{ old('boton_descripcion_2_texto', $home->boton_descripcion_2_texto) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('boton_descripcion_2_texto')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="boton_descripcion_2_redireccion" class="text-sm font-semibold text-black">Enlace Botón
                            2</label>
                        <input type="text" name="boton_descripcion_2_redireccion" id="boton_descripcion_2_redireccion"
                            value="{{ old('boton_descripcion_2_redireccion', $home->boton_descripcion_2_redireccion) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('boton_descripcion_2_redireccion')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-[#DCDCDC]">
                    <div class="flex flex-col gap-1">
                        <label for="eleccion_video_imagen" class="text-sm font-semibold text-black">Elección Fondo</label>
                        <select name="eleccion_video_imagen" id="eleccion_video_imagen"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                            <option value="video"
                                {{ old('eleccion_video_imagen', $home->eleccion_video_imagen) == 'video' ? 'selected' : '' }}>
                                Video</option>
                            <option value="imagen"
                                {{ old('eleccion_video_imagen', $home->eleccion_video_imagen) == 'imagen' ? 'selected' : '' }}>
                                Imagen en caso de que no haya video</option>
                        </select>
                        @error('eleccion_video_imagen')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="video" class="text-sm font-semibold text-black">Subir Video (.mp4)</label>
                        <input type="file" name="video" id="video" accept="video/mp4,mov,avi,webm"
                            class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans'] bg-white">
                        <span class="text-[11px] text-gray-500">Recomendado: 1920x1080 px | Máx: 20 MB | Formato: MP4,
                            WebM</span>
                        @if ($home->video)
                            <p class="text-xs text-black italic">¡Ya hay un video guardado!</p>
                        @endif
                        @error('video')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="imagen" class="text-sm font-semibold text-black">Subir Imagen en caso de que no haya video</label>
                        <input type="file" name="imagen" id="imagen" accept="image/*"
                            class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans'] bg-white">
                        <span class="text-[11px] text-gray-500">Recomendado: 1920x1080 px | Máx: 2 MB | Formato: JPG, PNG,
                            WebP</span>
                        @if ($home->imagen)
                            <div class="w-24 h-16 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50 mt-1">
                                <img src="{{ asset('storage/' . $home->imagen) }}" alt="Fondo actual"
                                    class="w-full h-full object-cover">
                            </div>
                        @endif
                        @error('imagen')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="border border-[#DCDCDC] p-6 rounded-lg bg-gray-50 flex flex-col gap-6">
                <h2 class="text-lg font-semibold text-black border-b border-[#DCDCDC] pb-2">Sección "Nosotros"</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1 md:col-span-2">
                        <label for="nosotros_titulo" class="text-sm font-semibold text-black">Título Nosotros</label>
                        <input type="text" name="nosotros_titulo" id="nosotros_titulo"
                            value="{{ old('nosotros_titulo', $home->nosotros_titulo) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('nosotros_titulo')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1 md:col-span-2">
                        <label for="nosotros_descripcion" class="text-sm font-semibold text-black">Descripción
                            Nosotros</label>
                        <textarea name="nosotros_descripcion" id="nosotros_descripcion" rows="4"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black resize-y bg-white">{{ old('nosotros_descripcion', $home->nosotros_descripcion) }}</textarea>
                        @error('nosotros_descripcion')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="nosotros_boton_texto" class="text-sm font-semibold text-black">Texto Botón
                            Nosotros</label>
                        <input type="text" name="nosotros_boton_texto" id="nosotros_boton_texto"
                            value="{{ old('nosotros_boton_texto', $home->nosotros_boton_texto) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('nosotros_boton_texto')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="nosotros_boton_redireccion" class="text-sm font-semibold text-black">Enlace Botón
                            Nosotros</label>
                        <input type="text" name="nosotros_boton_redireccion" id="nosotros_boton_redireccion"
                            value="{{ old('nosotros_boton_redireccion', $home->nosotros_boton_redireccion) }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('nosotros_boton_redireccion')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1 md:col-span-2">
                        <label for="nosotros_imagen" class="text-sm font-semibold text-black">Imagen del fondo de la
                            sección</label>
                        <input type="file" name="nosotros_imagen" id="nosotros_imagen" accept="image/*"
                            class="border border-[#DCDCDC] p-2 rounded text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans'] bg-white">
                        <span class="text-[11px] text-gray-500">Recomendado: 1200x800 px | Máx: 2 MB | Formato: JPG, PNG,
                            WebP</span>
                        @if ($home->nosotros_imagen)
                            <div class="w-24 h-16 border border-[#DCDCDC] rounded overflow-hidden bg-gray-50 mt-1">
                                <img src="{{ asset('storage/' . $home->nosotros_imagen) }}" alt="Nosotros imagen"
                                    class="w-full h-full object-cover">
                            </div>
                        @endif
                        @error('nosotros_imagen')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="border border-[#DCDCDC] p-6 rounded-lg bg-gray-50 flex flex-col gap-4">
                <h2 class="text-lg font-semibold text-black border-b border-[#DCDCDC] pb-2">Visibilidad de Secciones</h2>

                <div class="flex flex-col gap-3">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="mostrar_linea_productos" value="1"
                            {{ old('mostrar_linea_productos', $home->mostrar_linea_productos) ? 'checked' : '' }}
                            class="w-4 h-4 text-black rounded border-[#DCDCDC] focus:ring-0">
                        <span class="text-sm font-semibold text-black">Mostrar Línea de Productos</span>
                    </label>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="mostrar_productos_destacados" value="1"
                            {{ old('mostrar_productos_destacados', $home->mostrar_productos_destacados) ? 'checked' : '' }}
                            class="w-4 h-4 text-black rounded border-[#DCDCDC] focus:ring-0">
                        <span class="text-sm font-semibold text-black">Mostrar Productos Destacados</span>
                    </label>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="mostrar_recetas" value="1"
                            {{ old('mostrar_recetas', $home->mostrar_recetas) ? 'checked' : '' }}
                            class="w-4 h-4 text-black rounded border-[#DCDCDC] focus:ring-0">
                        <span class="text-sm font-semibold text-black">Mostrar Sección de Recetas</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-[#DCDCDC]">
                <a href="{{ url()->previous() }}"
                    class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-black text-white hover:bg-[#ffa221] hover:text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
@endsection

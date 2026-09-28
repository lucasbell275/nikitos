@extends('app.layout-admin')

@section('content')
    @if (session('success'))
        <div class="flex justify-center mt-6">
            <p class="bg-orange-300/70 text-lg font-semibold py-2 px-4 rounded-[20px] font-['Nunito_Sans']">
                {{ session('success') }}
            </p>
        </div>
    @endif

    <div class="max-w-[1258px] mx-auto px-4 py-12 font-['Nunito_Sans']">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-black">Configuración de Metadata y SEO</h1>
        </div>

        <form action="{{ route('admin.metadata.update') }}" method="POST"
            class="border border-[#DCDCDC] p-8 rounded-xl bg-white shadow-sm flex flex-col gap-6">
            @csrf
            @method('PUT')

            <!-- Título SEO Principal -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-gray-700">Título SEO Principal del Sitio*</label>
                <input type="text" name="meta_title" value="{{ old('meta_title', $metadata['meta_title'] ?? '') }}"
                    class="border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                    placeholder="Ej: Mi Empresa - Productos y Recetas" required>
            </div>

            <!-- Descripción Global -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-gray-700">Descripción Global (Meta Description)</label>
                <textarea name="meta_description" rows="3"
                    class="border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                    placeholder="Breve descripción que aparece en los motores de búsqueda...">{{ old('meta_description', $metadata['meta_description'] ?? '') }}</textarea>
            </div>

            <!-- Palabras Clave -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-bold text-gray-700">Palabras Clave (Keywords)</label>
                <input type="text" name="meta_keywords"
                    value="{{ old('meta_keywords', $metadata['meta_keywords'] ?? '') }}"
                    class="border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                    placeholder="recetas, papas, snacks, distribuidores">
            </div>

            <!-- Botón de Guardar -->
            <div class="pt-4 border-t border-[#DCDCDC] flex justify-end">
                <button type="submit"
                    class="bg-black text-white hover:bg-[#ffa221] hover:text-black font-bold px-6 py-3 rounded-lg text-sm transition">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
@endsection

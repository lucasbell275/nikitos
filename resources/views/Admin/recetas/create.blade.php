@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto px-4 py-12 font-['Nunito_Sans']" x-data="{
        ingredientes: {{ json_encode(old('ingredientes', [''])) }},
        pasos: {{ json_encode(old('numero_paso', [''])) }}
    }">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-black">Crear Nueva Receta</h1>
            <a href="{{ route('admin.recetas.index') }}" class="text-gray-600 hover:underline font-bold text-sm">← Volver</a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.recetas.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-8 bg-white p-8 rounded-xl shadow-md border border-[#DCDCDC]">
            @csrf

            <!-- titulo -->
            <div class="flex flex-col gap-2">
                <label class="font-bold text-gray-700 text-sm">Título de la receta*</label>
                <input type="text" name="titulo_receta" value="{{ old('titulo_receta') }}"
                    placeholder="Ej: Papas fritas con cheddar"
                    class="border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                    required>
            </div>

            <!-- imagen tiempo y porciones -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700 text-sm">Imagen*</label>
                    <input type="file" name="imagen" accept="image/*"
                        class="border border-[#DCDCDC] rounded-lg p-2 text-sm outline-none focus:border-black bg-white file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']"
                        required>
                    <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG,
                        WebP</span>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700 text-sm">Tiempo de preparación (min)*</label>
                    <input type="number" name="tiempo_preparacion" value="{{ old('tiempo_preparacion') }}"
                        placeholder="Ej: 30"
                        class="border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                        required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700 text-sm">Tiempo de coccion (min)*</label>
                    <input type="number" name="tiempo_coccion" value="{{ old('tiempo_coccion') }}" placeholder="Ej: 30"
                        class="border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                        required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700 text-sm">Porciones*</label>
                    <input type="number" name="porciones" value="{{ old('porciones') }}" placeholder="Ej: 4"
                        class="border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                        required>
                </div>
            </div>

            {{-- Ingredientes --}}
            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-bold text-gray-800">Ingredientes</h3>

                <div class="flex flex-col gap-3">
                    <template x-for="(ingrediente, index) in ingredientes" :key="index">
                        <div class="flex gap-3 items-center">
                            <input type="text" :name="`ingredientes[${index}][ingrediente]`"
                                x-model="typeof ingredientes[index] === 'object' ? ingredientes[index].ingrediente : ingredientes[index]"
                                placeholder="Ej: 1 bolsa de papas Nikitos clásicas"
                                class="w-full border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white"
                                required>

                            <button type="button" @click="ingredientes.splice(index, 1)" x-show="ingredientes.length > 1"
                                class="text-red-500 font-bold px-3 py-2 transition hover:text-red-700">✕</button>
                        </div>
                    </template>
                </div>

                <button type="button" @click="ingredientes.push('')"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold px-4 py-2 rounded-lg text-sm w-max transition">
                    + Agregar ingrediente
                </button>
            </div>

            {{-- Pasos --}}
            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-bold text-gray-800">
                    Preparación / Pasos
                </h3>

                <div class="flex flex-col gap-3">
                    <template x-for="(paso, index) in pasos" :key="index">
                        <div class="flex gap-3 items-start">
                            <span class="font-bold pt-3 text-gray-600 text-sm" x-text="(index + 1) + '.-'"></span>

                            <textarea :name="`numero_paso[${index}][descripcion]`"
                                x-model="typeof pasos[index] === 'object' ? pasos[index].descripcion : pasos[index]"
                                placeholder="Describe el paso..." rows="2"
                                class="w-full border border-[#DCDCDC] rounded-lg p-3 outline-none focus:border-black text-sm bg-white" required></textarea>

                            <button type="button" @click="pasos.splice(index, 1)" x-show="pasos.length > 1"
                                class="text-red-500 font-bold px-3 py-2 pt-3 transition hover:text-red-700">✕</button>
                        </div>
                    </template>
                </div>

                <button type="button" @click="pasos.push('')"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold px-4 py-2 rounded-lg text-sm w-max transition">
                    + Agregar paso
                </button>
            </div>

            <!-- Boton para guardar -->
            <div>
                <button type="submit"
                    class="bg-black text-white hover:bg-[#ffa221] hover:text-black font-bold px-6 py-3 rounded-lg text-sm transition">
                    Guardar Receta
                </button>
            </div>
        </form>
    </div>
@endsection

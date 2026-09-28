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
        <h1 class="text-2xl font-bold text-black mb-6">Agregar Nuevo Distribuidor</h1>

        <form action="{{ route('admin.mapa.store') }}" method="POST"
            class="border border-[#DCDCDC] p-6 rounded-lg bg-white shadow-sm flex flex-col gap-6">
            @csrf

            {{-- Nombre del distribuidor --}}
            <div class="flex flex-col gap-1">
                <label for="nombre" class="text-sm font-semibold text-black">Nombre del Distribuidor</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white"
                    placeholder="Ej: Distribuidor Central">
                @error('nombre')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Provincia y Ciudad --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-1">
                    <label for="provincia" class="text-sm font-semibold text-black">Provincia</label>
                    <select name="provincia" id="provincia" required
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        <option value="">Selecciona una provincia</option>
                        @foreach (config('provincias') as $prov)
                            <option value="{{ $prov }}" {{ old('provincia') == $prov ? 'selected' : '' }}>
                                {{ $prov }}
                            </option>
                        @endforeach
                    </select>
                    @error('provincia')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="ciudad" class="text-sm font-semibold text-black">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad') }}" required
                        class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white"
                        placeholder="Ej: La Plata">
                    @error('ciudad')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Dirección física --}}
            <div class="flex flex-col gap-1">
                <label for="direccion" class="text-sm font-semibold text-black">Dirección</label>
                <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" required
                    class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white"
                    placeholder="Ej: Av. 7 y 50">
                @error('direccion')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <details class="text-sm text-[#5C5C5C]">
                <summary class="cursor-pointer font-semibold">Ajustar ubicación en el mapa (opcional)</summary>
                <p class="mt-2">Si no ingresás coordenadas, se buscarán a partir de la dirección al guardar.</p>
                <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <label for="latitud" class="flex flex-col gap-1">Latitud
                        <input id="latitud" name="latitud" type="number" step="any" min="-90" max="90" value="{{ old('latitud') }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('latitud') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </label>
                    <label for="longitud" class="flex flex-col gap-1">Longitud
                        <input id="longitud" name="longitud" type="number" step="any" min="-180" max="180" value="{{ old('longitud') }}"
                            class="border border-[#DCDCDC] p-2.5 rounded text-sm focus:outline-none focus:border-black bg-white">
                        @error('longitud') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </label>
                </div>
            </details>

            {{-- Botones de acción --}}
            <div class="flex items-center justify-end gap-3 mt-4 pt-4 border-t border-[#DCDCDC]">
                <a href="{{ route('admin.mapa.index') }}"
                    class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-black text-white hover:bg-[#ffa221] hover:text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                    Guardar Distribuidor
                </button>
            </div>
        </form>
    </div>
@endsection

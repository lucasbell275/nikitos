@extends('app.layout-admin')

@section('content')
    <div class="mx-auto max-w-[1258px] px-5 py-10 font-['Nunito_Sans']">
        <div class="mb-8">
            <h1 class="font-['Nunito'] text-3xl font-extrabold">Listas de precios</h1>
            <p class="mt-1 text-sm text-gray-500">Los PDF publicados están disponibles para todos los clientes de la zona privada.</p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl bg-green-50 p-4 text-sm font-semibold text-green-700">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.listas-precios.store') }}" method="POST" enctype="multipart/form-data"
            class="mb-8 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            @csrf
            <h2 class="mb-5 text-lg font-bold">Publicar un PDF</h2>
            <div class="flex flex-wrap items-end gap-4">
                <label class="min-w-[240px] flex-1 text-sm font-semibold">
                    Nombre de la lista
                    <input type="text" name="titulo" value="{{ old('titulo') }}" required maxlength="255"
                        placeholder="Lista de precios - Septiembre 2024"
                        class="mt-2 w-full rounded-lg border border-gray-200 px-4 py-3 font-normal focus:border-[#FFA221] focus:outline-none">
                    @error('titulo') <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> @enderror
                </label>
                <label class="min-w-[240px] flex-1 text-sm font-semibold">
                    Archivo PDF
                    <input type="file" name="archivo" accept=".pdf,application/pdf" required
                        class="mt-2 w-full rounded-lg border border-gray-200 px-4 py-2.5 font-normal">
                    @error('archivo') <span class="mt-1 block text-xs text-red-600">{{ $message }}</span> @enderror
                </label>
                <button type="submit" class="rounded-lg bg-[#FFA221] px-5 py-3 text-sm font-bold text-white">Publicar</button>
            </div>
            <p class="mt-3 text-xs text-gray-500">Tamaño máximo: 7 MB.</p>
        </form>

        <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="w-full min-w-[650px] text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr><th class="p-4">Nombre</th><th class="p-4">Formato</th><th class="p-4">Peso</th><th class="p-4 text-right">Acciones</th></tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($listas as $lista)
                        <tr>
                            <td class="p-4 font-semibold">{{ $lista->titulo }}</td>
                            <td class="p-4">PDF</td>
                            <td class="p-4">{{ $lista->pesoLegible() }}</td>
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-4">
                                    <a href="{{ route('admin.listas-precios.ver', $lista) }}" target="_blank" rel="noopener"
                                        class="font-bold text-[#F29109]">Ver</a>
                                    <a href="{{ route('admin.listas-precios.descargar', $lista) }}"
                                        class="font-bold text-[#F29109]">Descargar</a>
                                    <form action="{{ route('admin.listas-precios.destroy', $lista) }}" method="POST"
                                        onsubmit="return confirm('¿Eliminar esta lista de precios?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-bold text-red-600">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-10 text-center text-gray-500">Todavía no hay PDF publicados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto py-10 px-6 mt-5 font-['Nunito_Sans']">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-black">Gestión de Distribuidores</h1>
            <a href="{{ route('admin.mapa.create') }}"
                class="bg-[#ffa221] hover:bg-[#ffa221]/80 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow transition font-['Nunito_Sans']">
                + Nuevo Distribuidor
            </a>
        </div>

        <div class="flex flex-col rounded-lg overflow-hidden border border-[#DCDCDC] bg-white">

            <!-- Encabezado -->
            <div
                class="flex items-center bg-gray-50 px-6 py-3 border-b border-[#DCDCDC] text-xs font-semibold text-gray-700 uppercase tracking-wider">
                <div class="w-1/4">Nombre</div>
                <div class="w-1/6">Provincia</div>
                <div class="w-1/6">Ciudad</div>
                <div class="w-1/4">Dirección</div>
                <div class="w-1/6 text-right">Acciones</div>
            </div>

            <!-- Cuerpo de registros -->
            <div class="flex flex-col divide-y divide-[#DCDCDC]">
                @forelse ($distribuidor as $distribuidor)
                    <div class="flex items-center px-6 py-4 hover:bg-gray-50 transition-colors text-sm text-gray-700">
                        <div class="w-1/4 font-medium text-black pr-4">{{ $distribuidor->nombre }}</div>
                        <div class="w-1/6 pr-2">{{ $distribuidor->provincia }}</div>
                        <div class="w-1/6 pr-2">{{ $distribuidor->ciudad }}</div>
                        <div class="w-1/4 text-gray-500 pr-4">{{ $distribuidor->direccion }}</div>

                        <!-- Acciones -->
                        <div class="w-1/6 flex items-center justify-end gap-2">
                            <a href="{{ route('admin.mapa.edit', $distribuidor->id) }}"
                                class="text-black hover:font-semibold bg-indigo-50 hover:bg-[#ffa221] px-2 py-1.5 rounded-md transition text-sm font-['Nunito_Sans']">
                                Editar
                            </a>

                            <form action="{{ route('admin.mapa.destroy', $distribuidor->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este distribuidor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-100 hover:bg-[#ffa221] hover:font-semibold px-2 py-1.5 rounded-md transition text-sm font-medium">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-gray-500 text-sm">
                        No hay distribuidores cargados todavía.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

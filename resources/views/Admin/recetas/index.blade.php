@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto py-10 px-6 mt-5 font-['Nunito_Sans']">
        <!-- Encabezado y botón de crear -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 font-['Nunito_Sans']">Gestión de Recetas</h1>
            <a href="{{ route('admin.recetas.create') }}"
                class="bg-[#ffa221] hover:bg-[#ffa221]/80 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow transition font-['Nunito_Sans']">
                + Nueva Receta
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contenedor Flex en reemplazo de la tabla -->
        <div class="flex flex-col shadow-sm rounded-xl overflow-hidden border border-gray-200 bg-white">

            <!-- Encabezado de columnas -->
            <div
                class="flex items-center bg-gray-50 px-6 py-3 border-b border-gray-200 text-xs font-bold font-['Nunito_Sans'] text-gray-600 uppercase tracking-wider">
                <div class="w-1/6">Imagen</div>
                <div class="w-1/4">Título</div>
                <div class="w-1/6">Ingredientes</div>
                <div class="w-1/6">Pasos</div>
                <div class="w-1/6">Tiempo / Porciones</div>
                <div class="w-1/6 text-right">Acciones</div>
            </div>

            <!-- Cuerpo de registros -->
            <div class="flex flex-col divide-y divide-gray-200 text-sm font-['Nunito_Sans']">
                @forelse($receta as $rec)
                    <div class="flex items-center px-6 py-4 hover:bg-gray-50/50 transition-colors">

                        <!-- Imagen -->
                        <div class="w-1/6 flex items-center">
                            <img src="{{ asset('storage/' . $rec->imagen) }}" alt="{{ $rec->titulo_receta }}"
                                class="w-12 h-12 object-cover rounded-lg border shadow-sm">
                        </div>

                        <!-- Título -->
                        <div class="w-1/4 font-bold text-gray-800 pr-4">{{ $rec->titulo_receta }}</div>

                        <!-- Ingredientes -->
                        <div class="w-1/6 text-gray-600">{{ $rec->ingredientes->count() }} ítems</div>

                        <!-- Pasos -->
                        <div class="w-1/6 text-gray-600">{{ $rec->preparacion->count() }} pasos</div>

                        <!-- Tiempo / Porciones -->
                        <div class="w-1/6 text-gray-600 text-xs">
                            {{ $rec->tiempo_preparacion }} min<br>
                            {{ $rec->porciones }} porciones
                        </div>

                        <!-- Acciones -->
                        <div class="w-1/6 flex items-center justify-end gap-2">
                            <a href="{{ route('admin.recetas.edit', $rec) }}"
                                class="text-black hover:font-semibold bg-indigo-50 hover:bg-[#ffa221] px-2 py-1.5 rounded-md transition text-sm font-['Nunito_Sans']">Editar</a>

                            <form action="{{ route('admin.recetas.destroy', $rec) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta receta?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-100 hover:bg-[#ffa221] hover:font-semibold px-2 py-1.5 rounded-md transition text-sm font-medium">Eliminar</button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-gray-500 text-sm">
                        No hay recetas cargadas todavía.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection

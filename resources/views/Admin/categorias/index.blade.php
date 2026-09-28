@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto py-10 px-6 mt-5">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-black text-black">Lista de categorias</h1>
            <div class=" flex gap-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans']  transition">
                    Volver al Dashboard
                </a>
                <a href="{{ route('admin.categorias.create') }}"
                    class="bg-[#ffa221] hover:bg-[#ffa221]/80 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow transition font-['Nunito_Sans']">
                    + Nueva Categoría
                </a>
            </div>
        </div>


        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif


        <div class="flex flex-col rounded-lg overflow-hidden border border-[#DCDCDC] bg-white">


            <div
                class="flex items-center bg-gray-50 px-6 py-3 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider ">
                <div class="w-1/6 font-['Nunito_Sans']">Imagen</div>
                <div class="w-2/6 font-['Nunito_Sans']">Nombre</div>
                <div class="w-2/6 font-['Nunito_Sans']">Color</div>
                <div class="w-1/6 font-['Nunito_Sans'] text-right">Acciones</div>
            </div>


            <div class="flex flex-col divide-y divide-gray-200">
                @forelse($categorias as $categoria)
                    <div class="flex items-center px-6 py-4">


                        <div class="w-1/6 flex items-center">
                            @if ($categoria->imagen)
                                <img src="{{ asset('storage/' . $categoria->imagen) }}"
                                    alt="{{ $categoria->nombre_categoria }}"
                                    class="h-12 w-12 object-cover rounded-md border shadow-sm">
                            @else
                                <span class="text-xs text-gray-500 italic">Sin imagen</span>
                            @endif
                        </div>


                        <div class="w-2/6 text-sm font-medium text-black pr-4 font-['Nunito_Sans']">
                            {{ $categoria->nombre_categoria }}
                        </div>


                        <div class="w-2/6 flex items-center space-x-2">
                            <span class="h-6 w-6 rounded-full border shadow-inner inline-block"
                                style="background-color: {{ $categoria->color }};"></span>
                            <span
                                class="text-xs  uppercase text-black font-['Nunito_Sans']">{{ $categoria->color }}</span>
                        </div> 


                        <div class="w-1/6 flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.categorias.edit', $categoria->id) }}"
                                class="text-black hover:font-semibold bg-indigo-100 hover:bg-[#ffa221] px-2 py-1.5 rounded-md transition text-sm font-['Nunito_Sans']">
                                Editar
                            </a>

                            <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
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
                    <div class="px-6 py-10 text-center text-sm text-gray-500">
                        No hay categorías registradas todavía.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection

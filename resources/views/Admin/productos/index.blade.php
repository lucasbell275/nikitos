@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto mt-5 py-10 px-6">


        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-black text-black">Lista de productos</h1>
            <div class=" flex gap-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans']  transition">
                    Volver al Dashboard
                </a>
                <a href="{{ route('admin.productos.create') }}"
                    class="bg-[#ffa221] hover:bg-[#ffa221]/80 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow transition font-['Nunito_Sans']">
                    + Nuevo producto
                </a>
            </div>
        </div>
        <div class=" flex flex-col rounded-lg overflow-hidden border border-[#DCDCDC] bg-white">


            <div
                class="flex items-center bg-gray-50 px-6 py-3 border-b border-gray-200 text-xs font-medium text-gray-500 uppercase tracking-wider">
                <div class="w-1/6 font-['Nunito_Sans']">Imagen</div>
                <div class="w-2/6 font-['Nunito_Sans']">Nombre</div>
                <div class="w-1/6 font-['Nunito_Sans']">Categoría</div>
                <div class="w-1/6 font-['Nunito_Sans']">Cajas / Unidades</div>
                <div class="w-1/6 font-['Nunito_Sans'] text-right">Acciones</div>
            </div>

            
            <div class="flex flex-col divide-y divide-gray-200">
                @forelse($productos as $producto)
                    <div class="flex items-center px-6 py-4">

                        
                        <div class="w-1/6 flex items-center">
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                    class="h-12 w-12 object-cover rounded-md border shadow-sm">
                            @else
                                <span class="text-xs text-gray-500 italic">Sin imagen</span>
                            @endif
                        </div>

                        
                        <div class="w-2/6 text-sm font-medium text-black pr-4 font-['Nunito_Sans']">
                            {{ $producto->nombre }}
                        </div>

                        
                        <div class="w-1/6 text-sm text-black font-['Nunito_Sans']">
                            {{ $producto->categorias->nombre_categoria ?? 'Sin categoría' }}
                        </div>

                        
                        <div class="w-1/6 text-sm text-black font-['Nunito_Sans']">
                            {{ $producto->cajas }} / {{ $producto->unidades }}
                        </div>

                        
                        <div class="w-1/6 flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.productos.edit', $producto->id) }}"
                                class="text-black hover:font-semibold bg-indigo-50 hover:bg-[#ffa221] px-2 py-1.5 rounded-md transition text-sm font-['Nunito_Sans']">
                                Editar
                            </a>

                            <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
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
                        No hay productos registrados todavía.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection

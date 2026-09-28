@extends('app.layout-admin')

@section('content')
    @if (session('success'))
        <div class="flex justify-center mt-6">
            <p class="bg-orange-300/70 text-lg font-semibold py-2 px-4 rounded-[20px] font-['Nunito_Sans'] text-black">
                {{ session('success') }}
            </p>
        </div>
    @endif

    @if (session('error'))
        <div class="flex justify-center mt-6">
            <p class="bg-red-300/70 text-lg font-semibold py-2 px-4 rounded-[20px] font-['Nunito_Sans'] text-black">
                {{ session('error') }}
            </p>
        </div>
    @endif

    <div class="max-w-[1258px] mx-auto px-4 py-12 font-['Nunito_Sans']">
        <div class="flex justify-between items-center mb-8">
            <div class="flex flex-col gap-1">
                <h1 class="text-3xl font-bold text-black">Gestión de Usuarios</h1>
                <p class="text-gray-600 text-sm">Administra los usuarios registrados en el sistema.</p>
            </div>
            <span class="bg-white border border-[#DCDCDC] px-4 py-2 rounded-lg text-sm font-semibold text-black shadow-sm">
                Total: {{ $usuarios->count() }}
            </span>
        </div>

        <div class="bg-white border border-[#DCDCDC] rounded-xl shadow-sm overflow-hidden">
            <!-- Cabecera simulada -->
            <div
                class="grid grid-cols-1 md:grid-cols-4 border-b border-[#DCDCDC] bg-gray-50 text-xs uppercase text-gray-600 font-bold p-4">
                <div>Nombre</div>
                <div>Email</div>
                <div>Fecha de Registro</div>
                <div class="text-right">Acciones</div>
            </div>

            <!-- Contenido de la lista -->
            <div class="divide-y divide-[#DCDCDC] text-sm">
                @forelse($usuarios as $usuario)
                    <div
                        class="grid grid-cols-1 md:grid-cols-4 items-center p-4 hover:bg-gray-50 transition gap-2 md:gap-0">
                        <div class="text-gray-800 font-medium">{{ $usuario->name }}</div>
                        <div class="text-gray-600 break-all">{{ $usuario->email }}</div>
                        <div class="text-gray-600">{{ $usuario->created_at->format('d/m/Y H:i') }}</div>
                        <div class="text-right">
                            <form action="{{ route('admin.users.destroy', $usuario->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 hover:text-red-700 font-bold text-xs bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        No hay usuarios registrados todavía.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

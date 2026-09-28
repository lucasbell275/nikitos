@extends('app.layout-admin')

@section('content')
    <div class="mx-auto max-w-[1050px] px-5 py-10 font-['Nunito_Sans']">
        <a href="{{ route('admin.pedidos.index') }}" class="text-sm font-bold text-[#F29109]">← Volver a pedidos</a>
        @if (session('success'))
            <div class="mt-5 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('success') }}</div>
        @endif

        <div class="mt-6 flex flex-wrap justify-between gap-5">
            <div>
                <h1 class="font-['Nunito'] text-3xl font-extrabold">Pedido #{{ $pedido->id }}</h1>
                <p class="mt-2 text-sm text-gray-500">{{ $pedido->fecha->format('d/m/Y') }} · {{ $pedido->razon_social }}</p>
            </div>
            <form action="{{ route('admin.pedidos.update', $pedido) }}" method="POST" class="flex items-end gap-2">
                @csrf
                @method('PUT')
                <label class="text-sm font-semibold">Estado
                    <select name="estado" class="mt-1 block rounded-lg border border-gray-200 px-3 py-2">
                        @foreach (['recibido', 'en preparación', 'completado', 'cancelado'] as $estado)
                            <option value="{{ $estado }}" {{ $pedido->estado === $estado ? 'selected' : '' }}>{{ ucfirst($estado) }}</option>
                        @endforeach
                    </select>
                </label>
                <button class="rounded-lg bg-[#FFA221] px-4 py-2 text-sm font-bold text-white">Guardar</button>
            </form>
        </div>

        <div class="mt-8 grid gap-5 rounded-xl border border-gray-200 bg-white p-6 text-sm md:grid-cols-3">
            <div><span class="text-gray-500">Cliente</span><p class="font-bold">{{ $pedido->cliente->nombre }}</p></div>
            <div><span class="text-gray-500">Código</span><p class="font-bold">{{ $pedido->codigo_cliente }}</p></div>
            <div><span class="text-gray-500">Localidad</span><p class="font-bold">{{ $pedido->localidad }}</p></div>
            <div><span class="text-gray-500">Horario</span><p class="font-bold">{{ $pedido->horario }}</p></div>
            <div><span class="text-gray-500">Condiciones de pago</span><p class="font-bold">{{ $pedido->condiciones_pago }}</p></div>
            <div><span class="text-gray-500">Archivo</span><p>@if ($pedido->archivo_path)<a href="{{ route('admin.pedidos.archivo', $pedido) }}" class="font-bold text-[#F29109]">Descargar adjunto</a>@else Sin archivo @endif</p></div>
            <div class="md:col-span-3"><span class="text-gray-500">Observaciones</span><p>{{ $pedido->observaciones ?: 'Sin observaciones' }}</p></div>
        </div>

        <h2 class="mb-4 mt-10 font-['Nunito'] text-xl font-extrabold">Productos</h2>
        <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white">
            <table class="w-full min-w-[600px] text-left text-sm">
                <thead class="bg-gray-50"><tr><th class="p-4">Código</th><th class="p-4">Producto</th><th class="p-4">Presentación</th><th class="p-4">Cantidad</th></tr></thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($pedido->items as $item)
                        <tr><td class="p-4">{{ $item->codigo }}</td><td class="p-4">{{ $item->nombre }}</td><td class="p-4">{{ $item->presentacion }}</td><td class="p-4">{{ $item->cantidad }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('app.layout-admin')
@section('content')
<div class="mx-auto max-w-[1258px] px-5 py-10 font-['Nunito_Sans']">
    <h1 class="font-['Nunito'] text-3xl font-extrabold">Pedidos de clientes</h1>
    <p class="mt-2 mb-8 text-sm text-gray-500">Pedidos enviados desde la zona privada.</p>
    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white">
        <table class="w-full min-w-[700px] text-left text-sm"><thead class="bg-gray-50 text-xs uppercase text-gray-500"><tr><th class="p-4">Pedido</th><th class="p-4">Cliente</th><th class="p-4">Fecha</th><th class="p-4">Productos</th><th class="p-4">Estado</th><th class="p-4 text-right"></th></tr></thead><tbody class="divide-y divide-gray-100">
        @forelse ($pedidos as $pedido)
            <tr><td class="p-4 font-bold">#{{ $pedido->id }}</td><td class="p-4">{{ $pedido->cliente->razon_social }}</td><td class="p-4">{{ $pedido->fecha->format('d/m/Y') }}</td><td class="p-4">{{ $pedido->items_count }}</td><td class="p-4 capitalize">{{ $pedido->estado }}</td><td class="p-4 text-right"><a href="{{ route('admin.pedidos.show', $pedido) }}" class="font-bold text-[#F29109]">Ver pedido</a></td></tr>
        @empty
            <tr><td colspan="6" class="p-10 text-center text-gray-500">Todavía no hay pedidos.</td></tr>
        @endforelse
        </tbody></table>
    </div>
    <div class="mt-6">{{ $pedidos->links() }}</div>
</div>
@endsection
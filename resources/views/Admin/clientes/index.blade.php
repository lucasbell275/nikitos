@extends('app.layout-admin')
@section('content')
<div class="mx-auto max-w-[1258px] px-5 py-10 font-['Nunito_Sans']">
    @if (session('success'))<div class="mb-6 rounded-xl bg-green-50 p-4 text-sm font-semibold text-green-700">{{ session('success') }}</div>@endif
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div><h1 class="font-['Nunito'] text-3xl font-extrabold">Clientes</h1><p class="mt-1 text-sm text-gray-500">Accesos a la zona privada y datos de facturación.</p></div>
        <a href="{{ route('admin.clientes.create') }}" class="rounded-lg bg-[#FFA221] px-5 py-3 text-sm font-bold text-white hover:bg-[#EE9237]">+ Registrar cliente</a>
    </div>
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <form action="{{ route('admin.clientes.index') }}" method="GET" class="flex w-full max-w-md gap-2">
            <input type="search" name="buscar" value="{{ $search }}" placeholder="Buscar nombre, usuario o código" class="min-w-0 flex-1 rounded-lg border border-gray-200 px-4 py-2 text-sm focus:border-[#FFA221] focus:outline-none">
            <button class="rounded-lg border border-[#FFA221] px-4 py-2 text-sm font-bold text-[#F29109]">Buscar</button>
        </form>
        <span class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-bold">Total: {{ $total }}</span>
    </div>
    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="w-full min-w-[800px] text-left text-sm">
            <thead class="bg-gray-50 text-xs uppercase text-gray-500"><tr><th class="p-4">Cliente</th><th class="p-4">Usuario</th><th class="p-4">Código</th><th class="p-4">Localidad</th><th class="p-4">Pedidos</th><th class="p-4">Estado</th><th class="p-4 text-right">Acción</th></tr></thead>
            <tbody class="divide-y divide-gray-100">
            @forelse ($clientes as $cliente)
                <tr>
                    <td class="p-4"><strong class="block">{{ $cliente->nombre }}</strong><span class="text-xs text-gray-500">{{ $cliente->razon_social }}</span></td>
                    <td class="p-4">{{ $cliente->username }}</td><td class="p-4">{{ $cliente->codigo_cliente }}</td><td class="p-4">{{ $cliente->localidad }}</td>
                    <td class="p-4">{{ $cliente->pedidos_count }}</td>
                    <td class="p-4"><span class="rounded-full px-3 py-1 text-xs font-bold {{ $cliente->activo ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-600' }}">{{ $cliente->activo ? 'Activo' : 'Inactivo' }}</span></td>
                    <td class="p-4 text-right"><a href="{{ route('admin.clientes.edit', $cliente) }}" class="font-bold text-[#F29109] hover:underline">Editar</a></td>
                </tr>
            @empty
                <tr><td colspan="7" class="p-10 text-center text-gray-500">No se encontraron clientes.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $clientes->links() }}</div>
</div>
@endsection
@extends('app.layout-zona-privada')
@section('content')
<a href="{{ route('zona.pedidos.index') }}" class="text-sm font-bold text-[#F29109]">← Volver al historial</a>
@if (session('success'))<div class="mt-5 rounded-xl bg-green-50 p-4 text-sm text-green-700">{{ session('success') }}</div>@endif
<div class="mt-6 flex flex-wrap items-start justify-between gap-3"><div><h1 class="font-['Nunito'] text-3xl font-extrabold">Pedido #{{ $pedido->id }}</h1><p class="mt-2 text-sm text-gray-500">{{ $pedido->fecha->format('d/m/Y') }} · {{ $pedido->razon_social }}</p></div><span class="rounded-full bg-orange-50 px-4 py-2 text-sm font-bold capitalize text-[#F29109]">{{ $pedido->estado }}</span></div>
<div class="mt-8 grid gap-4 rounded-xl border border-gray-200 p-6 text-sm md:grid-cols-3">
    <div><span class="text-gray-500">Código de cliente</span><p class="font-semibold">{{ $pedido->codigo_cliente }}</p></div>
    <div><span class="text-gray-500">Localidad</span><p class="font-semibold">{{ $pedido->localidad }}</p></div>
    <div><span class="text-gray-500">Horario</span><p class="font-semibold">{{ $pedido->horario }}</p></div>
    <div><span class="text-gray-500">Condiciones de pago</span><p class="font-semibold">{{ $pedido->condiciones_pago }}</p></div>
    <div class="md:col-span-2"><span class="text-gray-500">Observaciones</span><p class="font-semibold">{{ $pedido->observaciones ?: 'Sin observaciones' }}</p></div>
</div>
<h2 class="mt-10 mb-4 font-['Nunito'] text-xl font-extrabold">Productos solicitados</h2>
<div class="overflow-x-auto rounded-xl border border-gray-200"><table class="w-full min-w-[600px] text-left text-sm"><thead class="bg-gray-100"><tr><th class="p-4">Código</th><th class="p-4">Nombre</th><th class="p-4">Presentación</th><th class="p-4">Cantidad</th></tr></thead><tbody class="divide-y divide-gray-200">@foreach ($pedido->items as $item)<tr><td class="p-4">{{ $item->codigo }}</td><td class="p-4">{{ $item->nombre }}</td><td class="p-4">{{ $item->presentacion }}</td><td class="p-4">{{ $item->cantidad }}</td></tr>@endforeach</tbody></table></div>
@endsection
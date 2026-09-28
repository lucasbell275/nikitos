@extends('app.layout-admin')
@section('content')
<div class="mx-auto max-w-[920px] px-5 py-10 font-['Nunito_Sans']">
    <a href="{{ route('admin.clientes.index') }}" class="text-sm font-bold text-[#F29109]">← Volver a clientes</a>
    <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm md:p-8">
        <h1 class="font-['Nunito'] text-3xl font-extrabold">{{ $cliente->exists ? 'Editar cliente' : 'Registrar cliente' }}</h1>
        <p class="mt-2 text-sm text-gray-500">El usuario y la contraseña sirven solo para el acceso de clientes.</p>
        @if ($errors->any())<div class="mt-6 rounded-lg bg-red-50 p-4 text-sm text-red-700"><ul class="list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ $cliente->exists ? route('admin.clientes.update', $cliente) : route('admin.clientes.store') }}" method="POST" class="mt-8">
            @csrf
            @if ($cliente->exists) @method('PUT') @endif
            <div class="grid gap-5 md:grid-cols-2">
                <label class="text-sm font-semibold">Nombre de contacto*
                    <input name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Razón social*
                    <input name="razon_social" value="{{ old('razon_social', $cliente->razon_social) }}" required class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Usuario*
                    <input name="username" value="{{ old('username', $cliente->username) }}" autocomplete="off" required class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Código de cliente*
                    <input name="codigo_cliente" value="{{ old('codigo_cliente', $cliente->codigo_cliente) }}" required class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Localidad*
                    <input name="localidad" value="{{ old('localidad', $cliente->localidad) }}" required class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Horario de recepción
                    <input name="horario" value="{{ old('horario', $cliente->horario) }}" placeholder="Ej: 9:00 a 17:00" class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Condiciones de pago*
                    <input name="condiciones_pago" value="{{ old('condiciones_pago', $cliente->condiciones_pago) }}" required class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Correo electrónico
                    <input type="email" name="email" value="{{ old('email', $cliente->email) }}" class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <label class="text-sm font-semibold">Contraseña{{ $cliente->exists ? ' (dejá en blanco para conservarla)' : '*' }}
                    <input type="password" name="password" autocomplete="new-password" {{ $cliente->exists ? '' : 'required' }} class="mt-2 w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
                </label>
                <div class="flex items-end pb-2">
                    <label class="flex items-center gap-2 text-sm font-semibold"><input type="checkbox" name="activo" value="1" {{ old('activo', $cliente->exists ? $cliente->activo : true) ? 'checked' : '' }} class="h-5 w-5 accent-[#FFA221]"> Cuenta activa</label>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3 border-t border-gray-100 pt-6">
                <a href="{{ route('admin.clientes.index') }}" class="rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-bold">Cancelar</a>
                <button type="submit" class="rounded-lg bg-[#FFA221] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#EE9237]">{{ $cliente->exists ? 'Guardar cambios' : 'Registrar cliente' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('app.layout')
@section('content')
<section class="mx-auto max-w-md px-4 pt-44 font-['Nunito_Sans']">
    <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-lg">
        <h1 class="font-['Nunito'] text-3xl font-bold">Acceso de clientes</h1>
        <p class="mt-2 text-sm text-gray-500">Ingresá a la zona privada para hacer pedidos y consultar su historial.</p>
        @if ($errors->any())<div class="mt-5 rounded-lg bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>@endif
        <form action="{{ route('clientes.login.submit') }}" method="POST" class="mt-6 flex flex-col gap-4">
            @csrf
            <label class="text-sm font-semibold">Usuario
                <input name="username" value="{{ old('username') }}" autocomplete="username" required class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
            </label>
            <label class="text-sm font-semibold">Contraseña
                <input name="password" type="password" autocomplete="current-password" required class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-[#FFA221] focus:outline-none">
            </label>
            <button type="submit" class="rounded-full bg-[#FFA221] px-5 py-3 font-bold text-white hover:bg-[#EE9237]">Ingresar</button>
        </form>
    </div>
</section>
@endsection